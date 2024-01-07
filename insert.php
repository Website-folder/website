<?php

$server = "localhost";
$username = "krxugfqu_revature"; 
$password = "CodelyokO8888"; 
$dbname = "manager"; 

$conn = mysqli_connect($server, $username, $password, $dbname); 

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>