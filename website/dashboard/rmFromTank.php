<?php

    include "../partials/dangerchar.php";
  	include "../partials/dbconnect.php";

  	// Get fishid from jquery
  	$fishId = $_POST['id'];
  	$tankId = $_SESSION['tankID'];

  	// Delete Fish from Virtual Tank
  	$sql = "DELETE FROM InTank WHERE TankID='$tankId' and FishID='$fishId'" ;
  	$result = $conn->query($sql);
  	echo "The Fish has been removed from your tank.";