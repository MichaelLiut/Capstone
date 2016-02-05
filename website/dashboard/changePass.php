<?php

	include "../partials/dangerchar.php";
  	include "../partials/dbconnect.php";

	$currpass = $_POST['currpass'];
	$newpass = $_POST['newpass'];

	$userID = $_SESSION['userID'];

	$sql = "SELECT Password FROM User WHERE ID=$userID";
	$result = $conn->query($sql);
	$getPass = $result->fetch_assoc();
	$pass = $getPass['Password'];
	
	if ($currpass != $pass) {
		echo "Current Password does not match.";
	} else {
		$sql2 = "UPDATE User SET Password='$newpass' WHERE ID=$userID";
		$conn->query($sql2);
		echo "Password has been changed.";
	}

