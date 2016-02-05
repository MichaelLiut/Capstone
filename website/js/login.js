$(document).ready(function(){
    var userallgood = false;
    var passallgood = false;
    var pass2allgood = false;
    var emailallgood = false;

    $("#submit").click(function(e) {
        e.preventDefault();
        var user = $("#username").val();
        var pass = $("#password").val();

        if (!user || !pass) {
            toast ("Incorrect Username/Password. Try again.", 1000);
        }
        else {

            $.ajax({ 
                url: 'login.php',
                data: {username: user, password: pass},
                type: 'POST',
                success: function(output) {
                    if (!output) {
                        toast("Incorrect Username/Password. Try again.", 1000);
                    } else {
                        toast(output, 1000);
                        setTimeout(function(){ window.location = "../dashboard"; }, 1250);
                    }
                },
                error: function(output) {
                    toast(output,1000);
                }
            });
        }
    });

    $("#openreg").click(function(e) {
        e.preventDefault();
        $(".regpage").show();
        setTimeout(function() {
         $(".regpage").removeClass('regpagesmall');
        },150);
        setTimeout(function() {
         $(".regformhide").removeClass('regformhide');
        },500);
    });

    $("#closereg").click(function(e) {
        e.preventDefault();
        $("#regheader").addClass('regformhide');
        $("#bar").addClass('regformhide');
        $("#formcard").addClass('regformhide');
        
        setTimeout(function() {
         $(".regpage").addClass('regpagesmall');
        },150);
        setTimeout(function() {
         $(".validate").val('').focusout();
         $(".regpage").hide();
        },500);

    });

    $("#regsubmit").click(function(e) {
        e.preventDefault();
        var fname = $("#first_name").val();
        var lname = $("#last_name").val();
        var user = $("#userreg").val();
        var pass = $("#userpass").val();
        var pass2 = $("#userpass2").val();
        var fishmo = $("#fishmoID").val();
        // var email = $("#email").val();
        // var fishmoID = $("#fishmoID").val();


        if (!fname || !lname || !user || !pass || !pass2 || !email || !fishmoID) {
            toast ("Please fill out the form.", 1000);
        }
        else {
            if (pass != pass2) {
               toast ("Passwords don't match", 1000); 
            } else {
                if(userallgood && passallgood && pass2allgood && emailallgood){
                    $.ajax({ 
                        url: 'register.php',
                        data: {firstname:fname, lastname:lname, username: user, password: pass, fishmoID: fishmo},
                        type: 'POST',
                        success: function(output) {
                            toast(output, 1000);
                            setTimeout(function(){ window.location = "../login"; }, 1250);
                        
                        },
                        error: function(output) {
                            toast(output,1000);
                        }
                    });
                } else {
                    toast("The form is invalid.", 1000);
                }
            }
        }
    });


    /************** Form Toasts ***************/
    var user_regex = /[a-zA-Z]{6,25}/;
    var pass_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/;
    var email_regex = /([a-zA-Z0-9]*\@[a-z]{1,15}\.[a-z]{1,3})/;

    $("#userreg").blur(function(){
        if ( !user_regex.test($("#userreg").val()) ) {
            toast("Username must be at least 6 characters",1000);
        } else {
            userallgood = true;
        }
    });

    $("#userpass").blur(function(){
        if ( !pass_regex.test($("#userpass").val()) ) {
            toast("Password must be at least 6 characters",1250);
            toast("1 Capital",1500);
            toast("1 Digit",1750);
        } else {
            passallgood = true;
        }
    });

    $("#userpass2").blur(function(){
        if ( $("#userpass2").val() != $("#userpass").val() ) {
            toast("Passwords don't match.",1000);
        } else {
            pass2allgood = true;
        }
    });

    $("#email").blur(function(){
        if ( !email_regex.test($("#email").val()) ) {
            toast("Email is invalid", 1000);
        } else {
            emailallgood = true;
        }
    });

});