<?php

include 'dangerchar.php';
include 'dbconnect.php';

// Getting the tank information
include 'tankpull.php';

// Getting the fish from the database
include 'fishpull.php';

$tankID = $tankInfo['ID'];
$sql = "SELECT FishID FROM InTank WHERE TankID = '$tankID'";
$result = $conn->query($sql);

$fishInTank = [];

// The fish the user has in the tank
if ($result == TRUE) {
	while ($row = $result->fetch_assoc()) {
		$fishInTank[] = $row;
	}
	//print_r($fishInTank);
} else {
	$error = "Error. Cannot retrieve virtual tank information";
	include '../dashboard/error.html.php';
}

$virtualTank = [];

// Loading the virtual tank
for ($i = 0; $i <= count($fishInTank) - 1; ++$i) {
	$find = $fishInTank[$i]['FishID'];
	$sql2 = "SELECT Name, Picture, TempLow, TempHigh, Compatible FROM Fish WHERE ID = '$find'";
	$temp = $conn->query($sql2);

	if ($temp == TRUE) {
		$add = $temp->fetch_assoc();
		$virtualTank[$i] = $add;
	} else {
		$error = "Error. Cannot retrieve virtual tank information";
		include 'error.html.php';
	}
}

//print_r($virtualTank);

?>