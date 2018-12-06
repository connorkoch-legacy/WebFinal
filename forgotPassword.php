<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="author" content="password">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var email = document.forms["pwForm"]["email"].value;
        if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }

		if (exists){

			alert("Email does not exist. Enter in a valid email");
			return false;

		}
		<?php
		// TODO: Enter a link for a reset link page
		$msg = "Here is your password reset link: ";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail($_POST["email"],"Password Reset",msg);
		?>
		notifyUser();
        return true;
    }
    function notifyUser() {
        var email = document.forms["pwForm"]["email"].value;
        alert("An email has been sent to " + email + ". Please check your inbox.");
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="pwForm" action="loginPage.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Forgot Password</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter your email address and a link will be sent to reset your password.</p>

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>

            <div class="submitbar">
                <button class="login" type="submit">Verify Email</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
