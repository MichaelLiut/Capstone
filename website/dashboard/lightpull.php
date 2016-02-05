<?php

$tankId = $_SESSION['userID'];

$sql = "SELECT Lights, LightColour FROM Tank WHERE ID='$tankId'";
$result = $conn->query($sql);
$result = $result->fetch_assoc();

if ($result['Lights'] == TRUE) {
	$lights = "ON";
} else {
	$lights = "OFF";
}

$lightColour = ucfirst($result['LightColour']);
$lightRef = $result['LightColour'];

?>