<?php

//error_reporting(0);

$server = "localhost";
$user = "demo";
$password = 'sL38857R5%$T';
$dbName = "states";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli($server, $user, $password, $dbName);
$state = mysqli_real_escape_string($conn, $_GET['state']);
$query = "SELECT capital FROM states WHERE state = '$state' LIMIT 1";
$result = $conn->query($query);

$output = "";
while($rs = $result->fetch_assoc()) {
    if ($output != "") {$output .= ",";}
    $output .= '{"capital":"'  . $rs["capital"] . '"}';
}
$output ='{"records":['.$output.']}';
$conn->close();

echo($output);
?>
