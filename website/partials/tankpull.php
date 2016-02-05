<?php
include 'dangerchar.php';
include 'dbconnect.php';

// Getting the tank information after getting the tank ID
$userID = $_SESSION['userID'];
$sql = "SELECT * FROM Tank WHERE UserID = '$userID'";
$result = $conn->query($sql);

if ($result == TRUE) {
  $check = $result->fetch_assoc();
  if (isset($check)) {
  	$tankInfo = $check;
  } else {
  	$error = "Error retrieving tank information. Please log in again.";
		$_SESSION['logout'] = TRUE;
		header('location:/index.php');
  }
} else {
	$error = "Error retrieving tank information. Please log in again.";
	$_SESSION['logout'] = TRUE;
	header('location:/index.php');
}

$_SESSION['tankID'] = $tankInfo;

?>