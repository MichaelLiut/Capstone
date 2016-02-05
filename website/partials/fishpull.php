<?php

include 'dangerchar.php';
include 'dbconnect.php';

// Getting the fish saved on the database to be displayed
$sql = "SELECT * FROM Fish";
$result = $conn->query($sql);

if ($result == TRUE) {
  if (isset($check)) {
  	while ($row = $result->fetch_assoc()) {
  		$fish[] = $row;
  	}
  } else {
  	$error = "Error retrieving fish information. Please log in again.";
		$_SESSION['logout'] = TRUE;
		header('location:/index.php');
  }
} else {
	$error = "Error retrieving fish information. Please log in again.";
	$_SESSION['logout'] = TRUE;
	header('location:/index.php');
}

?>