<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");
$delete_type = $_POST["delete_type"];
if (isset($_POST['delete_ids'])) {
    $delete_ids = implode(',', $_POST['delete_ids']);
    if($delete_type == 'PLAYER'){
        $sql = "DELETE FROM Player WHERE PlayerID IN ($delete_ids)";
        mysqli_query($connect, $sql);
    }
    else if($delete_type == "CLUB"){
        $sql = "DELETE FROM Club WHERE ClubID IN ($delete_ids)";
        mysqli_query($connect, $sql);
    }
    else if($delete_type == "COMPETITION"){
        $sql = "DELETE FROM Competition WHERE CompetitionID IN ($delete_ids)";
        mysqli_query($connect, $sql);
    }
    else if($delete_type == "COMPETITIONTEAM"){
        $delete_ids_2 = implode(',', $_POST['delete_ids_2']);
        $sql = "DELETE FROM CompetitionTeam WHERE CompetitionID IN ($delete_ids) AND ClubID IN ($delete_ids_2)";
        mysqli_query($connect, $sql);
    
    }
    else if($delete_type == "CONTRACT"){
        $sql = "DELETE FROM Contract WHERE ContractID IN ($delete_ids)";
        mysqli_query($connect, $sql);
    }
    else if($delete_type == "MATCHRECORD"){
        foreach ($_POST['delete_ids'] as $delete_id) {
            list($matchID, $playerID, $CompetitionID,$season, $Appearance, $goal,$assist,$yellow,$red,$Starting_MEM) = explode('|', $delete_id);
    
            $sql = "DELETE FROM MatchRecord WHERE MatctID = $matchID";
            $sql2 ="UPDATE PlayerStat
            SET
            Appearance = Appearance - $Appearance,
            Goals = Goals - $goal,
            Assists = Assists - $assist,
            YellowCards = YellowCards - $yellow,
            RedCards = RedCards - $red,
            Starting_MEM = Starting_MEM - $Starting_MEM
            WHERE PlayerID = '$playerID' AND CompetitionID = '$CompetitionID' AND Season = '$season';";
            mysqli_query($connect, $sql2);
            mysqli_query($connect, $sql);
        }
    }

    else if($delete_type == "STAT"){
        $sql = "DELETE FROM PlayerStat WHERE PlayerStatID IN ($delete_ids)";
        mysqli_query($connect, $sql);
    }
}
    

// 연결 닫기
mysqli_close($connect);
echo '<script>window.location = "football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=' . $delete_type . '";</script>';
?>