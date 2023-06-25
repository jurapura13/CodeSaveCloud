<?php
$header = 0;
$shownologin = 1;
$title = "Login";
include "assets/html/head.php";
?>
<div class="container user-select-none bg-body">


    <div class="login" style="display: flex;">
        <form method="post" style="margin: auto;width: 24em;">
            <div class="pb-2 mt-4 mb-4 border-bottom">
                <h2><img src="assets/media/logo-title.png" class="w-100" alt="" srcset=""><br>
                </h2>
            </div>
            <div class="alert d-none" id="msg">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address / Username</label>
                <div class="input-group mb-4">
                    <input type="email" class="form-control" aria-describedby="basic-addon2" style="background-color: rgba(var(--bs-tertiary-bg-rgb)) !important;" id="email" name="AuthText">
                </div>
            </div>

            <div class="mb-4">
                <label for="pass" class="form-label">Password</label>
                <input style="background-color: rgba(var(--bs-tertiary-bg-rgb)) !important;" type="password" class="form-control" id="pass" name="AuthText">

            </div>
            <input id="login-b" type="button" class="btn btn-primary btn-block w-100" value="Login" onclick="login();">
            <small>
                <p class="pt-1 text-muted">Don't have an account? <a href="<?php echo URL; ?>signup">Create one.</a></p>
            </small>
            <script>
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
                            action: "login",
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
            </script>

        </form>
    </div>

</div>