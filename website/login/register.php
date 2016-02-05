<?php

	include "../partials/dangerchar.php";
  	include "../partials/dbconnect.php";

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$fishmoID = $_POST['fishmoID'];


	$sql = "INSERT INTO User(`Username`, `FirstName`, `LastName`, `Password`) 
			VALUES ('$user','$fname', '$lname','$pass')";
	echo "boobs";
	if ($conn->query($sql)) {
		// Gets the new userID
		$sql2 = "SELECT ID FROM User WHERE Username = '$user'";
		$check = $conn->query($sql2);
		// Tries to pull the userID from the database if the user was created
		if ($check) {
			$check = $check->fetch_assoc();
			$userID = $check['ID'];

			// Checks if the tank ID was already taken
			$sql3 = "SELECT UserID FROM Tank WHERE ID = '$fishmoID'";
			$check2 = $conn->query($sql3);
			$check2 = $check2->fetch_assoc();

			if ($check2['UserID'] != 1) {
				echo "Registration Failed. Tank already registered.";
			} else {
				$sql4 = "UPDATE Tank SET UserID = '$userID' WHERE ID = '$fishmoID'";
				$conn->query($sql4);
				echo "Thank you for registering!";
			}
		} else {
			echo "Registration Failed.2";
		}
		//echo "Something went wrong.";
	} else {
		echo "Registration Failed.3";
	}