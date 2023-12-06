<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

if (isset($_POST["update_type"])) {
    $update_type = $_POST["update_type"];

    if ($update_type === "contract") {
        $playerName = $_POST["player_Recontract"];
        $club = $_POST["club_Recontract"];
        $conEndDate = date('Y-m-d',strtotime($_POST["ConEndDate"]));

        $sqlPlayerID = "SELECT PlayerID FROM Player WHERE Name = '$playerName'";
        $resultPlayerID = mysqli_query($connect, $sqlPlayerID);
        $rowPlayerID = mysqli_fetch_assoc($resultPlayerID);
        $playerID = $rowPlayerID["PlayerID"];

        $sqlClubID = "SELECT ClubID FROM Club WHERE ClubName = '$club'";
        $resultClubID = mysqli_query($connect, $sqlClubID);
        $rowClubID = mysqli_fetch_assoc($resultClubID);
        $ClubID = $rowClubID["ClubID"];
       
        $sql_latest_Contract = "SELECT *
        FROM Contract
        WHERE PlayerID = '$playerID' and CurrentClubID = '$ClubID'
        ORDER BY ContractEndDate DESC
        LIMIT 1;";

        $latest_contract = mysqli_query( $connect, $sql_latest_Contract );
        $row_latest_contract = mysqli_fetch_assoc($latest_contract);
        $LatestContractID = $row_latest_contract["ContractID"];

        $latest_data_id = $latest_data["ID"];

        $sql_update_latest = "UPDATE Contract
                         SET ContractEndDate = '$conEndDate'
                         WHERE ContractID = $LatestContractID;";
        mysqli_query($connect, $sql_update_latest);

    } 
}
mysqli_close($connect);
echo '<script>window.location = "football.php?id=ADMIN&ADMIN=INSERT";</script>';
?>
