<?php

$tankID = $_SESSION['tankID'];

$sql = "SELECT AVG(TempLow) AS lowTemp, AVG(TempHigh) AS highTemp FROM Fish, InTank WHERE InTank.FishID = Fish.ID and InTank.TankID='$tankID'";
$result = $conn->query($sql);
$row = $result->num_rows;
$temp = $result->fetch_assoc();
$tempLow = round($temp['lowTemp']);
$tempHigh = round($temp['highTemp']);

if ($row == 0) { 			// No Fish in the tank
	echo "<label id='lowTempSlider' data='0' class='col s1 grey-text text-darken-4'>0</label>"	.
		 "<label class='range-field col s4'>"	.
		 "<input id='tempSlider' type='range' min='0' max='0'>"	.
		 "</label>"	.
		 "<label id='highTempSlider' data='0' class='col s1 grey-text text-darken-4'>0</label>";
}
else {
	echo "<label id='lowTempSlider' data='$tempLow' class='col s1 grey-text text-darken-4'>$tempLow</label>"	.
		 "<label class='range-field col s4'>"	.
		 "<input id='tempSlider' type='range' min='$tempLow' max='$tempHigh'>"	.
		 "</label>"	.
		 "<label id='highTempSlider' data='$tempHigh' class='col s1 grey-text text-darken-4'>$tempHigh</label>";
}
