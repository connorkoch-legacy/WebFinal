<?php
session_destroy();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="author" content="password">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    //JS code that checks if the user is idle for 15 minutes
    var inactivityTime = function () {
        var t;
        window.onload = resetTimer;

        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;

        function logout() {
            alert("You are now logged out.")
            location.href = 'loginPage.php'
        }

        function resetTimer() {
            clearTimeout(t);
            t = setTimeout(logout, 15 * 60 * 1000) //set timeout time to 15 minutes of idle
        }
    };
    function validateForm() {
        var email = document.forms["pwForm"]["email"].value;
        if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="pwForm" action="passwordReset.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Forgot Password</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter your email address and a code will be sent to reset your password.</p>

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>

            <input type="hidden" name="code" value="<?php echo substr(md5(uniqid(rand(), true)), 16, 16);?>">

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
