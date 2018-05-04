<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "doorcontrol";
// Create connection
$conn = new mysqli($hostName, $userName, $password, $dbName, 3306);
// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}


?>