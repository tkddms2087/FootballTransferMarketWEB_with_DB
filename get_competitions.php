<?php
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

$country = $_REQUEST["country"]; 

$sql_competition = "SELECT CompetitionName FROM Competition WHERE Country = '$country'";

$result_competition = mysqli_query($connect, $sql_competition);

$competitions = array();

while ($row = mysqli_fetch_assoc($result_competition)) {
    $competitions[] = $row;
}

header("Content-Type: application/json");
echo json_encode($competitions);

mysqli_close($connect);
?>

