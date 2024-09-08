<?php 
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$database = "pulsemind";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT temp, heartrate,stressindex, time FROM esp32 ORDER BY testid DESC LIMIT 10";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$connection->close();
?>
