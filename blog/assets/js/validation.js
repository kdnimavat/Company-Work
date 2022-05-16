$(document).ready(function() {
    $("#savebtn").on("click", function(e) {
        e.preventDefault();
        $('#myform').children('input').removeAttr('style');
        var is_valid = true;
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var password = $("#pwd").val();
        var password2 = $("#cpwd").val();
        if (fname == "" || fname.match(/^ *$/)) {
            $('#error_fname').addClass('validation-class');
            document.getElementById("error_fname").style.color = "red";
            document.getElementById("error_fname").innerHTML = "*Please Enter Valid First Name*";
            is_valid = false;
        }
        if (lname == "" || lname.match(/^ *$/)) {
            $('#error_lname').addClass('validation-class');
            document.getElementById("error_lname").style.color = "red";
            document.getElementById("error_lname").innerHTML = "*Please Enter Valid Last Name*";

            is_valid = false;

        }
        if (email == "" || email.match(/^ *$/)) {
            $('#error_email').addClass('validation-class');
            document.getElementById("error_email").style.color = "red";
            document.getElementById("error_email").innerHTML = "*Please Enter Valid Email*";

            is_valid = false;

        }
        var passw = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if (!password.match(passw)) {
            $('#password').addClass('validation-class');
            document.getElementById("error_pass").innerHTML = "*password should contain atleast one number and one special character*";
            document.getElementById("error_pass").style.color = "red";

            is_valid = false;

        }
        if (password != password2) {
            $('#password2').addClass('validation-class')
            document.getElementById("error_cpass").innerHTML = "*Password not match*";
            document.getElementById("error_cpass").style.color = "red";
            is_valid = false;
        }
        console.log(is_valid);
        $('#myform').submit();

        // return is_valid = true;
    })
})