<?php
session_start();
$host="localhost"; // Host name 
$username="website"; // Mysql username 
$password="capstone2014"; // Mysql password
$db_name="fishmo"; // Database name 


// Connect to server and select database.
$conn=mysqli_connect("$host", "$username", "$password", "$db_name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>