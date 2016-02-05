$.ajax({
	url: 'ssh.php',
	data: {colour: colour},
	type: 'POST',
	success: function(output) {
		toast('work', 1000);
		if (output) {
			toast(output, 1000);
			//setTimeout(function(){ window.location = "../dashboard"; }, 1250);
		}
	},
	error: function(output) {
		toast(output, 1000);
	}
});