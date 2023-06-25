<?php
$header = 0;
$shownologin = 1;
$title = "Signup";
include "assets/html/head.php";
?>
<div class="container user-select-none bg-body">


    <div class="login" style="display: flex;">
        <form method="post" style="margin: auto;width: 24em;">
            <div class="pb-2 mt-4 mb-4 border-bottom">
                <h2><img src="assets/media/logo-title.png" class="w-100" alt="" srcset=""><br>
                    <h4 class="text-muted">Create an account.</h4>
                </h2>
            </div>
            <div class="alert d-none" id="msg">
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email address</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="email">

                </div>
                <div class="form-text">
                    We will never share your email with third parties.
                </div>
            </div>

            <div class="mb-4">
                <label for="basic-url" class="form-label">Create a username</label>
                <div class="input-group">
                    <input type="text" id="username" class="form-control">

                </div>
                <div class="form-text" id="username-text"></div>
            </div>



            <div class="mb-4">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass1">

            </div>
            <div class="mb-4">
                <label for="pass" class="form-label">Repeat password</label>
                <input type="password" class="form-control" id="pass2">

            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="PPTOS">
                <label class="form-check-label" for="PPTOS">
                    <small class="text-muted">
                        I agree with the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>
                    </small>
                </label>
            </div>

            <input id="login-b" type="button" class="btn btn-primary btn-block w-100" value="Create an account" onclick="register();">
            <small>
                <p class="pt-1 text-muted">Already have an account? <a href="<?php echo URL; ?>login">Sign in.</a></p>
            </small>
            <script>
                $('#username').keyup(throttle(function() {
                    var username = $("#username").val();
                    var formData = {
                        action: "CheckUsername",
                        username: username
                    };
                    $.ajax({
                            url: "assets/script/c/signup.c.php",
                            type: "post",
                            data: formData,
                            success: function(responseHTML) {
                                $('#username-text').html(responseHTML);
                            }
                        });
                }));

                function login() {

                    var email = $("#email").val();
                    var pass = $("#pass").val();

                    if (email == "" || pass == "") {
                        $("#msg").removeClass("d-none");
                        $("#login-b").removeClass("disabled");
                        $("#msg").addClass("alert-danger alert-sm");
                        $("#msg").html("E-mail ili lozinka su prazni.");
                        return 0;
                    } else {
                        var formData = {
                            action: "signup",
                            email: email,
                            pass: pass
                        };
                        $.ajax({
                            url: "assets/c/auth",
                            type: "post",
                            data: formData,
                            success: function(responseHTML) {
                                if (responseHTML == "0") {
                                    $("#msg").removeClass("d-none");
                                    $("#login-b").removeClass("disabled");
                                    $("#msg").addClass("alert-danger alert-sm");
                                    $("#msg").html("Neispravne vjerodajnice.");
                                    $("#pass").val("");
                                    return 0;

                                } else if (responseHTML == "block") {
                                    $("#msg").removeClass("d-none");
                                    $("#login-b").removeClass("disabled");
                                    $("#msg").addClass("alert-danger alert-sm");
                                    $("#msg").html("Korisnički račun je blokiran.");
                                    $("#pass").val("");
                                    return 0;

                                } else {
                                    $("#msg").removeClass("alert-danger");
                                    $("#msg").addClass("alert-success");
                                    $("#msg").html("Uspjeh! Preusmjeravam...");
                                    var returnVal = "<?php session_start();
                                                        echo $_SESSION["ReturnURL"] ?>";
                                    if (returnVal != "") {
                                        location.href = returnVal;
                                    } else {
                                        location.reload();

                                    }
                                }
                            }
                        });
                    }


                }

                function throttle(f, delay) {
                    var timer = null;
                    return function() {
                        var context = this,
                            args = arguments;
                        clearTimeout(timer);
                        timer = window.setTimeout(function() {
                                f.apply(context, args);
                            },
                            delay || 1000);
                    };
                }
            </script>

        </form>
    </div>

</div>