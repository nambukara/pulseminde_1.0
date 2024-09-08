<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if any)
$dbname = "pulsemind";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$temp = $_POST['temperature'];
$heartrate = $_POST['heart_rate'];
$stressindex = $_POST['stress_index'];

// Ensure stress index is formatted to two decimal places
//$stressindex = number_format((float)$stressindex, 2, '.', '');

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO esp32 (temp, heartrate, stressindex) VALUES (?, ?, ?)");
$stmt->bind_param("ddi", $temp, $heartrate, $stressindex); // Double for both temp and stress_index


// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
