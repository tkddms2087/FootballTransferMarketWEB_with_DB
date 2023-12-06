<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

$competition_sent = $_REQUEST["competition"];

$sql_club = "SELECT Competition.CompetitionName, Club.ClubName
FROM CompetitionTeam
JOIN Competition ON CompetitionTeam.competitionId = Competition.CompetitionId
JOIN Club ON CompetitionTeam.clubId = Club.ClubId
WHERE Competition.CompetitionName = '$competition_sent';";

$result_club = mysqli_query($connect, $sql_club);

$clubs = array();

while ($row = mysqli_fetch_assoc($result_club)) {
    $clubs[] = $row;
}

header("Content-Type: application/json");
echo json_encode($clubs);

mysqli_close($connect);
?>

