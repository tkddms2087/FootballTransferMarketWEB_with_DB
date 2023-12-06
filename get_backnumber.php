<?php
// 데이터베이스 연결 설정
$connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");

$player_sent = $_REQUEST["name"];

$sql_backnumber = "SELECT BackNumber
FROM Player
WHERE Name = '$player_sent';";

$result_backnumber = mysqli_query($connect, $sql_backnumber);

$backnumbers = array();

while ($row = mysqli_fetch_assoc($result_backnumber)) {
    $backnumbers[] = $row;
}

header("Content-Type: application/json");
echo json_encode($backnumbers);

mysqli_close($connect);
?>

