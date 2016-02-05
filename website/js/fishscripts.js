$(document).ready(function () {
	$('select').material_select();
	$('#tank-video-placeholder').show();
	$('#tank-video-feed').hide();
	var video = 0;
	var body = $('body');
	//Waterflow
	var waterflowvalue = 12;
	var currTemp = 21;
	var timertemp;
	var timerchangewf;

	timertemp = setInterval(changeTemp, 5000);

	/************* SIDE MENUS *******************/
	$('#toggle-fishDB').bind('click', function() {
		body.toggleClass('fishDB-open');
		return false;
	});

	$('#toggle-account').bind('click', function() {
		body.toggleClass('acctlist-open');
		return false;
	});


	/**************** TEMPERATURE ******************/
	function changeTemp() {
		if ($("#tempSlider").val() == 0) {
			$("#degree").text('21 C');
		} 
		if (currTemp > $("#tempSlider").val() && $("#tempSlider").val() != 0) {
			currTemp -= 0.005;
		} else if (currTemp < $("#tempSlider").val() && $("#tempSlider").val() != 0) {
			currTemp += 0.05;
		}
		$("#degree").text(( currTemp.toFixed(1) ) +' C');
	}


	/**************** LIGHTS ******************/
	$("#lightctrl").change(function() {
	    if(this.checked) {
	        $('#lighttxt').text('ON'); 
	        var light = true;
	        var colour = 'red';

	        $.ajax({
	        	url: 'ssh.php',
	        	data: {light: light, colour: colour},
	        	type: 'POST',
	        	success: function(output) {
	        		if (output) {
	        			toast(output, 1000);
	        			setTimeout(function(){ window.location = "../dashboard"; }, 1250);
	        		}
	        	},
	        	error: function(output) {
	        		toast(output, 1000);
	        	}
	        });
	    } else {
	    	$('#lighttxt').text('OFF');
	    	var light = false;

	        $.ajax({
	        	url: 'ssh.php',
	        	data: {light: light},
	        	type: 'POST',
	        	success: function(output) {
	        		if (output) {
	        			toast(output, 1000);
	        			setTimeout(function(){ window.location = "../dashboard"; }, 1250);
	        		}
	        	},
	        	error: function(output) {
	        		toast(output, 1000);
	        	}
	        });
	    }
	});

	/**************** CHANGE LIGHT COLOURS ******************/
	$('select').change( function() {
		$("#lightctrl").prop( "checked", true );
	  	if(this.value == 1) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('red-text text-accent-2').text(' Red'));

	  		changeColour('red');
	  	} 
	  	else if(this.value == 2) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('green-text text-accent-2').text(' Green'));

	  		changeColour('green');
	  	} 
	  	else if(this.value == 3) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('blue-text text-accent-2').text(' Blue'));

	  		changeColour('blue');
	  	}
	  	else if(this.value == 4) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('grey-text text-lighten-2').text(' White'));

	  		changeColour('white');
	  	}
	  	else if(this.value == 5) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('yellow-text text-accent-3').text(' Yellow'));

	  		changeColour('yellow');
	  	}
	  	else if(this.value == 6) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('purple-text text-lighten-2-text').text(' Purple'));

	  		changeColour('purple');
	  	}
	  	else if(this.value == 7) {
	  		$("#lctxt").text('Light Colour:').append($('<a></a>').addClass('cyan-text text-accent-2').text(' Disco'));

	  		changeColour('multi');
	  	}
	});

	function changeColour(colour) {
		$.ajax({
        	url: 'ssh.php',
        	data: {colour: colour},
        	type: 'POST',
        	success: function(output) {
        		if (output) {
        			toast(output, 1000);
        			setTimeout(function(){ window.location = "../dashboard"; }, 1250);
        		}
        	},
        	error: function(output) {
        		toast(output, 1000);
        	}
        });
	}

	/**************** WATER FLOW ******************/
	$("#waterflowctrl").change(function() {
	    if(this.checked) {
	    	$('#waterflowtext').text('ON ('+ (waterflowvalue) + ')');
	    	timerchangewf = setInterval(changewaterflow, 5000); 
	    } else {
	    	clearInterval(timerchangewf);
	    	waterflowvalue = 12;
	    	$('#waterflowtext').text('OFF'); 
	    }
	});

	function changewaterflow() {
	    if ( (Math.floor(Math.random() * (1 - 0 + 1)) + 0) == 1) {
			waterflowvalue += 1;
		} else {
			waterflowvalue += -1;
		}
		if (waterflowvalue < 12) {
			waterflowvalue++;
		}
		if (waterflowvalue > 13) {
			waterflowvalue--;
		} 
	 	$('#waterflowtext').text('ON ('+ (waterflowvalue) + ')');
	 }


	/**************** VIDEO ******************/
	$("#video-btn-play").click(function() {
		if(video == 0) {
		    $('#tank-video-placeholder').hide();
		    $('#tank-video-feed').show();
		    $('#tank-video-feed').prepend('<img id="video-feed" src="http://24.141.96.115:8080" width="100%" />')
			//$('#video-btn-play').removeClass('video-btn-center');
			$('#video-btn-play').addClass('video-btn-corner');
			$('#video-btn-icon').removeClass('mdi-av-play-arrow');
			$('#video-btn-icon').addClass('mdi-av-pause');
			video = 1;
		} else {
			$('#tank-video-placeholder').show();
		    $('#tank-video-feed').hide();
		    $("#tank-video-feed img").remove();
		    $('#video-btn-play').removeClass('video-btn-corner');
		    $('#video-btn-icon').addClass('mdi-av-play-arrow');
			$('#video-btn-icon').removeClass('mdi-av-pause');
		    video = 0;
		}
	});


	/**************** Adding Fish *****************/
	$(".addToTank").click(function(e) {
		e.preventDefault();
        var id = $(this).attr('id');

        $.ajax({ 
            url: 'addtotank.php',
            data: {id: id},
            type: 'POST',
            success: function(output) {
            	if (!output) {
            		toast("The fish exists already in the tank.", 1000);
            	} else {
	                toast(output, 1000);
	                setTimeout(function(){ window.location = "../dashboard"; }, 1250);
	            }
            },
            error: function(output) {
                toast(output, 1000);
            }
        });
	});
	
	/**************** Removing Fish *****************/
	$(".rmFromTank").click(function(e) {
		e.preventDefault();
        var id = $(this).attr('id');

        $.ajax({ 
            url: 'rmFromTank.php',
            data: {id: id},
            type: 'POST',
            success: function(output) {
	            toast(output, 1000);
	            setTimeout(function(){ window.location = "../dashboard"; }, 1250);
            },
            error: function(output) {
                toast(output, 1000);
            }
        });
	});

	/**************** CHANGING PASSWORD*****************/
	$("#save").click(function(e) {
		e.preventDefault();
        var currpass = $("#curr-password").val();
        var newpass = $("#new-password").val();
        var confpass = $("#conf-password").val();

        // toast ("currpass " + currpass, 1000);
        // toast ("newpass " + newpass, 1000);
        // toast ("confpass " + confpass, 1000);

        if (!currpass || !newpass || !confpass) {
        	toast("Please enter values for all fields.", 1000);
        } else {
        	if (newpass != confpass) {
        		toast("New password doesn't match.", 1000);
        	} else {
	        	$.ajax({ 
		            url: 'changePass.php',
		            data: {currpass: currpass, newpass: newpass},
		            type: 'POST',
		            success: function(output) {
			            toast(output, 1000);
			            console.log(output);
		            },
		            error: function(output) {
		                toast(output, 1000);
		            }
		        });
		    }
        }
       
	});

});

