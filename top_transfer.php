<?php
session_start(); 
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");
if (isset($_POST["add_type"])) {
if ($_POST['add_type']=='top-transfer') {
    $season = $_POST["season"];
    $citizenship = $_POST["citizenship"];
    $position = $_POST["position"];
    $age = $_POST["age"];
    $conditions = array(); ;
    $types = "";

    if ($season != "") {
        $from_year = substr($season, 0, 4);
        $from_date = $from_year . '-06-01';
        $to_year = strval(intval($from_year) + 1);   
        $to_date = $to_year . '-06-01';
        $conditions[] = " ? <= Contract.ContractStartDate ";
        $parameters[] = $from_date;
        echo $from_date;
        echo $to_date;
        $conditions[] = " Contract.ContractStartDate <= ? ";
        $parameters[] = $to_date;
        $types .= "ss";
    }

    if ($citizenship != "") {
        $conditions[] = " Player.Nationality = ? ";
        $parameters[] = $citizenship;
        $types .= "s";
    }

    if ($position != "") {
        $conditions[] = " Player.Position = ? ";
        $parameters[] = $position;
        $types .= "s";
    }

    if ($age != "") {
        $conditions[] = " Player.Age = ? ";
        $parameters[] = $age;
        $types .= "i";
    }


    
    $sql = "SELECT RANK() OVER (ORDER BY Transferfee DESC) AS RANK, Player.Name, Player.Age, Club.ClubName ,Transferfee,Nationality
    FROM Contract
    JOIN Player ON Contract.PlayerID = Player.PlayerID
    JOIN Club ON Contract.CurrentClubID = Club.ClubId
    ";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .='ORDER BY RANK;';
    $stmt = mysqli_prepare($connect, $sql);
    if (!empty($conditions)) {
        mysqli_stmt_bind_param($stmt, $types, ...$parameters);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $ranks[] = $row;
    }
    $_SESSION['ranks'] = $ranks;

}

if ($_POST['add_type']=='income-expenditure') {
    $period_from = $_POST["period_from"];
    $period_to = $_POST["period_to"];
    $country = $_POST["country"];
    $position = $_POST["position"];
    $age = $_POST["age"];
    $sorting = $_POST['sorting'];
    $conditions = array(); ;
    $types = "";

    if ($period_from != "ALL") {
        $from_year = substr($period_from, 0, 4);
        $from_date = $from_year . '-06-01';
        $conditions[] = " ? <= Contract.ContractStartDate ";
        $parameters[] = $from_date;
        $types .= "s";
    }

    if ($period_to != "ALL") {
        $to_year = substr($period_to, 0, 4);
        $to_year = strval(intval($to_year) + 1);      
        $to_date = $to_year . '-06-01';
        $conditions[] = " Contract.ContractStartDate <= ? ";
        $parameters[] = $to_date;
        $types .= "s";
    }

    if ($country != "") {
        $conditions[] = " Club.country = ? ";
        $parameters[] = $country;
        $types .= "s";
    }
    
    if ($position != "") {
        $conditions[] = " Player.Position = ? ";
        $parameters[] = $position;
        $types .= "s";
    }
    
    if ($age != "") {
        $conditions[] = " Player.Age = ? ";
        $parameters[] = $age;
        $types .= "i";
    }
    $sql = "SELECT "  ; 
    if($sorting=='Income'){
        $sql.="RANK() OVER (ORDER BY TotalIncome DESC) AS RANK,";
    }else if($sorting=='Expenditure'){
        $sql.="RANK() OVER (ORDER BY TotalExpenditure DESC) AS RANK,";
    }


    $sql .= "
    ClubName,
    SUM(CASE WHEN Contract.CurrentClubID = Club.ClubId THEN Transferfee ELSE 0 END) AS TotalExpenditure,
    SUM(CASE WHEN Contract.PreviousClubID = Club.ClubId THEN Transferfee ELSE 0 END) AS TotalIncome,
    (SUM(CASE WHEN Contract.PreviousClubID = Club.ClubId THEN Transferfee ELSE 0 END) - SUM(CASE WHEN Contract.CurrentClubID = Club.ClubId THEN Transferfee ELSE 0 END)) AS Balance
    FROM Contract
    JOIN Club ON Contract.CurrentClubID = Club.ClubId OR Contract.PreviousClubID = Club.ClubId
    JOIN Player ON Contract.PlayerID = Player.PlayerID
    ";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .= "GROUP BY ClubName
    ORDER BY RANK
    ;";
    $stmt = mysqli_prepare($connect, $sql);
    if (!empty($conditions)) {
        mysqli_stmt_bind_param($stmt, $types, ...$parameters);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $ranks[] = $row;
    }
    $_SESSION['ranks_income_Expenditure'] = $ranks;
    }
    else if($_POST['add_type'] == 'goal_assist'){
        $season = $_POST["season"];
        $citizenship = $_POST["citizenship"];
        $position = $_POST["position"];
        $competition = $_POST["competition"];
        $sorting = $_POST['sorting'];
        $conditions = array(); ;
        $types = "";
    
        if ($season != "") {
            $conditions[] = " PlayerStat.Season = ? ";
            $parameters[] = $season;
            $types .= "s";
        }
    
        if ($citizenship != "") {
            $conditions[] = " Nationality = ? ";
            $parameters[] = $citizenship;
            $types .= "s";
        }
        
        if ($position != "") {
            $conditions[] = " Player.Position = ? ";
            $parameters[] = $position;
            $types .= "s";
        }
        if ($competition != "") {
            $conditions[] = " CompetitionName = ? ";
            $parameters[] = $competition;
            $types .= "s";
        }

        $sql = "SELECT "  ; 
        if($sorting=='goal'){
            $sql.="RANK() OVER (ORDER BY Goals DESC) AS RANK,";
        }else if($sorting=='assist'){
            $sql.="RANK() OVER (ORDER BY Assists DESC) AS RANK,";
        }
    
    
        $sql .= "
        Name,
        Age,
        Nationality,
        Competition.CompetitionName,
        Goals,
        Assists, 
        Goals + Assists AS AttackPoints
        FROM PlayerStat
        JOIN Competition ON PlayerStat.CompetitionID = Competition.CompetitionID 
        JOIN Player ON PlayerStat.PlayerID = Player.PlayerID
        ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
            $sql .= "ORDER BY RANK;";
        }
        $stmt = mysqli_prepare($connect, $sql);
        if (!empty($conditions)) {
            mysqli_stmt_bind_param($stmt, $types, ...$parameters);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_assoc($result)) {
            $ranks[] = $row;
        }
        $_SESSION['ranks_goal_assist'] = $ranks;

    }
    else if($_POST['add_type'] == 'player'){
        $season = $_POST["season"];
        $competition = $_POST["competition"];
        $player_id = $_POST["player_id"];
        $name = $_POST["name"];
        $conditions = array(); ;
        $types = "";

        if ($season != "") {
            $conditions[] = " PlayerStat.Season = ? ";
            $parameters[] = $season;
            $types .= "s";
        }
        if ($competition != "") {
            $conditions[] = " CompetitionName = ? ";
            $parameters[] = $competition;
            $types .= "s";
        }
        
        $conditions[] = " Player.PlayerID = ? ";
        $parameters[] = $player_id;
        $types .= "i";
        $sql = "SELECT
        Starting_MEM,
        RedCards,
        YellowCards,
        Appearance,
        Goals,
        Assists
        FROM PlayerStat
        JOIN Competition ON PlayerStat.CompetitionID = Competition.CompetitionID 
        JOIN Player ON PlayerStat.PlayerID = Player.PlayerID
        ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $stmt = mysqli_prepare($connect, $sql);
        if (!empty($conditions)) {
            mysqli_stmt_bind_param($stmt, $types, ...$parameters);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_assoc($result)) {
            $ranks[] = $row;
        }
        $_SESSION['stats'] = $ranks;


}
}
else{

}

mysqli_close($connect);

if ($_POST['add_type']=='top-transfer'){
    echo '<script>window.location = "football.php?id=Transfer&top=transfer";</script>';
}else if ($_POST['add_type']== 'income-expenditure'){
    echo '<script>window.location = "football.php?id=Transfer&top=income-expenditure";</script>';
}else if ($_POST['add_type']== 'goal_assist'){
    echo '<script>window.location = "football.php?id=Transfer&top=goal_assist";</script>';
}
else if ($_POST['add_type']== 'player'){
    echo "<script>window.location = 'football.php?Player={$name}';</script>";
}


?>
