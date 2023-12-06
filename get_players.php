<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

$club_sent = $_REQUEST["club"];

$sql_club = "SELECT Player.Name, Club.ClubName
FROM Contract
JOIN Player ON Contract.PlayerID = Player.PlayerID
JOIN Club ON Contract.CurrentClubID = Club.ClubId
WHERE Club.ClubName = '$club_sent';";

$result_club = mysqli_query($connect, $sql_club);

$players = array();

while ($row = mysqli_fetch_assoc($result_club)) {
    $players[] = $row;
}

header("Content-Type: application/json");
echo json_encode($players);

mysqli_close($connect);
?>

