<?php
define('DB_SERVER1', 'localhost');
define('DB_USERNAME1', 'root');
define('DB_PASSWORD1', '');
define('DB_DATABASE1', 'fyp2023');
//OOP
$conn1 = new mysqli(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_DATABASE1);
// Check connection
if ($conn1->connect_error) {
	die("Connection failed: " . $conn1->connect_error);
}
//echo "Connected successfully";

//functional
/* $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} */
?>