<?php
$servername = "localhost";
$username = "root";
$password = "ohshoChee7ceing8";
$dbname = "g666";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

function sanitize_string($str) {
	global $conn;
	$sanitize = mysqli_real_escape_string($conn, $str);	
	return $sanitize;
}


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 