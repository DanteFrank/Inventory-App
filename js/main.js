$(document).ready(function () {
    var DOMAIN = "http://localhost/phpsandbox/Inventory";

    /*

    Registration Validation

    */
    $("#register_form").on("submit", function() {
        var status = false;
        var fname = $("#fname");
        var email = $("#email");
        var pwd = $("#pwd");
        var pwd2 = $("#pwd2");
        var type = $("#usertype");
    
        var email_pattern = new RegExp(/^[A-Za-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        if (fname.val() == "" || fname.val().length < 6) {
            fname.addClass("border-danger");
            $("#fname_error").html("<span class='text-danger'>Please Enter Your Name and should more than 6 char</span>");
            status = false;
        } else {
            fname.removeClass("border-danger");
            $("#fname_error").html("");
            status = true;
        }
        if (!email_pattern.test(email.val())) {
            email.addClass("border-danger");
            $("#email_error").html("<span class='text-danger'>Please Enter a valid Email Address</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#email_error").html("");
            status = true;
        }
        if (pwd.val() == "" || pwd.val().length <4) {
            pwd.addClass("border-danger");
            $("#pwd_error").html("<span class='text-danger'>Please Enter Passoword and Should be more than 4 char</span>");
            status = false;
        } else {
            pwd.removeClass("border-danger");
            $("#pwd_error").html("");
            status = true;
        }
        if (pwd2.val() == "" || pwd2.val().length <4) {
            pwd2.addClass("border-danger");
            $("#pwd2_error").html("<span class='text-danger'>Please Enter Passoword and Should be more than 4 char</span>");
            status = false;
        } else {
            pwd2.removeClass("border-danger");
            $("#pwd2_error").html("");
            status = true;
        }
        if (type.val() == "") {
            pwd.addClass("border-danger");
            $("#user_error").html("<span class='text-danger'>Choose User Type</span>");
            status = false;
        } else {
            type.removeClass("border-danger");
            $("#user_error").html("");
            status = true;
        }
        if (pwd.val() == pwd2.val() && status == false) {
            pwd2.addClass("border-danger");
            $("#pwd2_error").html("<span class='text-danger'>Passoword not matched</span>");
            status = false;
        } else {
            $.ajax({
                method: "POST",
                url: DOMAIN+"/includes/process.php",
                data: $("#register_form").serialize(),
                success: function (data) {
                    if (data == "Email_Already_Exists") {
                        alert("User Email Already Exits");
                    }else if(data == "Some_Error") {
                        alert("SQL Error");
                    } else {
                        window.location.href = encodeURI(DOMAIN+"/index.php?msg=Registerd! Please Login!");
                    }
                }
            });
        }

    })

    /*

    Login Validation

    */
    $("#login_form").on("submit", function() {
        var email = $("#login_email");
        var pwd = $("#login_pwd");
        var status = false;
        
        if (email.val() == "") {
            email.addClass("border-danger");
            $("#email_error").html("<span class='text-danger'>Please Enter a valid Email Address</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#email_error").html("");
            status = true;
        }
        if (pwd.val() == "") {
            pwd.addClass("border-danger");
            $("#pwd_error").html("<span class='text-danger'>Please Enter Password</span>");
            status = false;
        } else {
            pwd.removeClass("border-danger");
            $("#pwd_error").html("");
            status = true;
        }
        if (status) {
            $.ajax({
                method: "POST",
                url: DOMAIN+"/includes/process.php",
                data: $("#login_form").serialize(),
                success: function (data) {
                    if (data == "USER_DOES_NOT_EXISTS") {
                        email.addClass("border-danger");
                        $("#email_error").html("<span class='text-danger'>User Does Not Exist!</span>");
                    }else if(data == "WRONG_PASSWORD") {
                        pwd.addClass("border-danger");
                        $("#pwd_error").html("<span class='text-danger'>Wrong Password!</span>");
                    } else {
                        console.log(data);
                        window.location.href = encodeURI(DOMAIN+"/dashboard.php");
                    }
                }
            });
        }



    })
});

