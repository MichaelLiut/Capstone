<?php
	include('Net/SSH2.php');
	include('Crypt/Random.php');
	include('../partials/dangerchar.php');
	include('../partials/dbconnect.php');

	$tankId = $_SESSION['userID'];
	
	if (isset($_POST['light']) && $_POST['light'] == "true"){
		if (isset($_POST['colour'])) {
			$light = $_POST['light'];
			$colour = $_POST['colour'];

			$sql = "UPDATE Tank SET Lights=TRUE, LightColour='$colour' WHERE ID='$tankId'";
			$result = $conn->query($sql);
		}
	} else {
		if (isset($_POST['light']) && $_POST['light'] == "false") {
			$light = '';

			$sql = "UPDATE Tank SET Lights=FALSE WHERE ID='$tankId'";
			$result = $conn->query($sql);	
		} else {
			if (isset($_POST['colour'])) {
				$light = 'true';
				$colour = $_POST['colour'];

				$sql = "UPDATE Tank SET Lights=TRUE, LightColour='$colour' WHERE ID='$tankId'";
				$result = $conn->query($sql);
			}
		}
	}
	
	// Pi information
	$ip = '24.141.96.115'; 
	$user = 'pi'; 
	$pass = 'raspberry';

	$ssh = new Net_SSH2($ip);
	//echo "tits";
	if (!$ssh->login($user, $pass)) {
		echo 'Unable to connect';
	} else {
		if ($light == 'true') {
			$cmd = 'sudo python ' . $colour . 'Light.py';
			$ssh->exec($cmd);
		} else {
			$cmd = 'sudo python offLight.py';
			$ssh->exec($cmd);
		}
	}
?>