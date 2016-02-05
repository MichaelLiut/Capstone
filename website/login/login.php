<?php
	
	include '../partials/dangerchar.php';
    include '../partials/dbconnect.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	
	// Checking login with users in the database
	$sql = "SELECT ID, Username FROM User WHERE Username = '$username' AND Password = '$password'";
	$result = $conn->query($sql);
	$rows = $result->num_rows;

	if ($rows > 0) {
		$temp = $result->fetch_assoc();
		$_SESSION['username'] = $temp['Username'];
		$_SESSION['userID'] = $temp['ID'];

		// Getting the tank ID
		$userID = $_SESSION['userID'];

		$sql2 = "SELECT ID FROM Tank WHERE UserID='$userID'";
		$result2 = $conn->query($sql2);
		$rows2 = $result->num_rows;

		if ($rows2 > 0) {
			$temp2 = $result2->fetch_assoc();
			$_SESSION['tankID'] = $temp2['ID'];
		}

		echo "Login Successful";
	} 

	
	