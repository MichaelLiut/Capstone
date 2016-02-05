<?php

    include "../partials/dangerchar.php";
  	include "../partials/dbconnect.php";


  	// Get fishid from jquery
  	$fishId = $_POST['id'];
    $tankId = $_SESSION['tankID'];

  	// Check if Entry exists
  	$sql = "SELECT * FROM InTank WHERE TankID='$tankId' and FishID='$fishId'" ;
  	$result = $conn->query($sql);
  	$rows = $result->num_rows;

  	if ($rows == 0) {
  		// SQL query to insert into InTank
  		$sql2 = "INSERT INTO InTank VALUES (1, $fishId)";
  		$conn->query($sql2);
  		echo "The fish has been added to your tank.";
  	}

  	
