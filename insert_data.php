<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

if (isset($_POST["add_type"])) {
    $addType = $_POST["add_type"];

    if ($addType === "player") {
        $name = $_POST["name"];
        $citizenship = $_POST["citizenship"];
        $backnumber = $_POST["backnumber"];
        $preferFoot = $_POST["preferFoot"];
        $gender = $_POST["gender"];
        $height = $_POST["height"];
        $birthdate = date('Y-m-d',strtotime($_POST["birthdate"]));
        $position = $_POST["position"];

        $currentDate = date('Y-m-d');
        $birthdateTimestamp = strtotime($birthdate);
        $currentDateTimestamp = strtotime($currentDate);
        $age = date('Y', $currentDateTimestamp) - date('Y', $birthdateTimestamp);

        if (date('md', $currentDateTimestamp) < date('md', $birthdateTimestamp)) {
            $age--;
        }

        $sql = "INSERT INTO Player( Name, Nationality, BackNumber, PreferredFoot, Gender, Height, Birthdate, Position, Age)
            VALUES ('$name', '$citizenship', '$backnumber', '$preferFoot', '$gender', '$height', '$birthdate', '$position','$age');";

        mysqli_query( $connect, $sql );
    } elseif ($addType === "club") {
        $name = $_POST["name"];
        $country = $_POST["country"];
        $headcoach = $_POST["headcoach"];
        $sql = "INSERT INTO Club( ClubName, Country, HeadCoach)
            VALUES ('$name', '$country', '$headcoach');";
    
        mysqli_query( $connect, $sql );
    } else if ($addType === "competition") {
        $name = $_POST["name"];
        $country = $_POST["country"];
        $season = $_POST["season"];
        $sql = "INSERT INTO Competition( CompetitionName, Country, Season)
            VALUES ('$name', '$country', '$season');";
    
        mysqli_query( $connect, $sql );
    }
    elseif ($addType === "contract") {
        $playerName = $_POST["name"];
        $previousClubName = $_POST["previousClub"];
        $newClubName = $_POST["NewClub"];

        $sqlPlayerID = "SELECT PlayerID FROM Player WHERE Name = '$playerName'";
        $resultPlayerID = mysqli_query($connect, $sqlPlayerID);
        $rowPlayerID = mysqli_fetch_assoc($resultPlayerID);
        $playerID = $rowPlayerID["PlayerID"];

        $sqlPreviousClubID = "SELECT ClubID FROM Club WHERE ClubName = '$previousClubName'";
        $resultPreviousClubID = mysqli_query($connect, $sqlPreviousClubID);
        $rowPreviousClubID = mysqli_fetch_assoc($resultPreviousClubID);
        $previousClubID = $rowPreviousClubID["ClubID"];

        $sqlNewClubID = "SELECT ClubID FROM Club WHERE ClubName = '$newClubName'";
        $resultNewClubID = mysqli_query($connect, $sqlNewClubID);
        $rowNewClubID = mysqli_fetch_assoc($resultNewClubID);
        $newClubID = $rowNewClubID["ClubID"];
        $transferFee = $_POST["TrasnferFee"];

        
        $ConStartDate = date('Y-m-d',strtotime($_POST["ConStartDate"]));
        $ConEndDate = date('Y-m-d',strtotime($_POST["ConEndDate"])); 
        $sql = "INSERT INTO Contract(PlayerID, CurrentClubID, PreviousClubID, TransferFee,ContractStartDate,ContractEndDate)
            VALUES ('$playerID', '$newClubID','$previousClubID', '$transferFee','$ConStartDate', '$ConEndDate' );";

        mysqli_query($connect, $sql);
    }
    else if($addType === "matchrecord"){
        $name = $_POST['name'];
        $competition = $_POST['competition'];
        $home = $_POST['home'];
        $away = $_POST['away'];
        $Appearance = $_POST['Appearance'];
        $Starting_MEM = $_POST['Starting_MEM'];
        $season = $_POST['season'];
        $goal = $_POST['goal'];
        $assist = $_POST['assist'];
        $yellow = $_POST['yellow'];
        $red = $_POST['red'];
        $matchdate = date('Y-m-d',strtotime($_POST["matchdate"]));

        $sqlPlayerID = "SELECT PlayerID FROM Player WHERE Name = '$name';";
        $resultPlayerID = mysqli_query($connect, $sqlPlayerID);
        $rowPlayerID = mysqli_fetch_assoc($resultPlayerID);
        $playerID = $rowPlayerID["PlayerID"];

        $sqlhomeID = "SELECT ClubID FROM Club WHERE ClubName = '$home';";
        $resulthomeID = mysqli_query($connect, $sqlhomeID);
        $rowhomeID = mysqli_fetch_assoc($resulthomeID);
        $HomeClubID = $rowhomeID["ClubID"];

        $sqlAwayID = "SELECT ClubID FROM Club WHERE ClubName = '$away';";
        $resultAwayID = mysqli_query($connect, $sqlAwayID);
        $rowAwayID = mysqli_fetch_assoc($resultAwayID);
        $AwayClubID = $rowAwayID["ClubID"];

        $sqlComID = "SELECT CompetitionID FROM Competition WHERE CompetitionName = '$competition'";
        $resultComID = mysqli_query($connect, $sqlComID);
        $rowComID = mysqli_fetch_assoc($resultComID);
        $CompetitionID = $rowComID["CompetitionID"];


        $sql1 =  "INSERT INTO MatchRecord(PlayerID, CompetitionID, Appearance, Goals,Assists,YellowCards, RedCards, Starting_MEM, Season, Matchdate, HomeTeamID, AwayTeamID)
        VALUES ('$playerID', '$CompetitionID','$Appearance', '$goal','$assist', '$yellow','$red', '$Starting_MEM','$season', '$matchdate' , '$HomeClubID', '$AwayClubID');";

        mysqli_query($connect, $sql1);

        $row_num = 0;
        $sql2 = "SELECT * FROM PlayerStat WHERE PlayerID = '$playerID' AND CompetitionID = '$CompetitionID' AND Season = '$season';";
        $result_num_rows = mysqli_query($connect, $sql2);
        while ($row = mysqli_fetch_assoc($result_num_rows)) {
            $row_num+=1;
        }

        if($row_num == 0){
            echo $row_num;
            $sql3 = "INSERT INTO PlayerStat (PlayerID, CompetitionID, Appearance, Goals, Assists, YellowCards, RedCards, Starting_MEM,Season)
        VALUES ('$playerID', '$CompetitionID', '$Appearance', '$goal', '$assist', '$yellow', '$red', '$Starting_MEM', '$season');";
         mysqli_query($connect, $sql3);    
    }
    else{
        $sql4 ="UPDATE PlayerStat
        SET
            Appearance = Appearance + $Appearance,
            Goals = Goals + $goal,
            Assists = Assists + $assist,
            YellowCards = YellowCards + $yellow,
            RedCards = RedCards + $red,
            Starting_MEM = Starting_MEM + $Starting_MEM
        WHERE PlayerID = '$playerID' AND CompetitionID = '$CompetitionID' AND Season = '$season';";
        
        mysqli_query($connect, $sql4);
        
    }

        
    }
    else if ($addType === "CompetitionTeam") {
        $ClubName = $_POST["ClubName"];
        $CompetitionName = $_POST["CompetitionName"];

        $sqlClubID = "SELECT ClubID FROM Club WHERE ClubName = '$ClubName'";
        $resultClubID = mysqli_query($connect, $sqlClubID);
        $rowClubID = mysqli_fetch_assoc($resultClubID);
        $ClubID = $rowClubID["ClubID"];

        $sqlCompetition = "SELECT CompetitionID FROM Competition WHERE CompetitionName = '$CompetitionName'";
        $resultCompetitionID = mysqli_query($connect, $sqlCompetition);
        $rowCompetitionID = mysqli_fetch_assoc($resultCompetitionID);
        $CompetitionID = $rowCompetitionID["CompetitionID"];

        $sql = "INSERT INTO CompetitionTeam (CompetitionID, ClubID)
            VALUES ('$CompetitionID', '$ClubID' );";

        mysqli_query($connect, $sql);
    }

    
}
mysqli_close($connect);
echo '<script>window.location = "football.php?id=ADMIN&ADMIN=INSERT";</script>';
?>
