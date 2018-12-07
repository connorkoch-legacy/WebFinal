<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Verification</title>
    <meta charset="utf-8">
    <meta name="author" content="verification">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <?php
    // the message
    $msg = "Your verification code is: " . $_POST["code"];

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail($_POST["email"],"Verification Code",$msg);
    ?>

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
    function validateCode() {
        if(document.forms["pwForm"]["verify"].value === '<?php echo $_POST["code"]?>'){
            return true;
        }

        return false;

    }


    </script>
</head>

<?php

    $_SESSION["user"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["email"] = $_POST["email"];

?>

<body>
    <br><br><br><br>
    <form name="pwForm" action="accountCreation.php" method="post" class="loginForm" onsubmit="return validateCode()">
        <div class="container">
            <h2>Verify Account</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter the code sent to your email in the following box to verify your account.</p>

            <label class="labe" for="verify"><b>Verification Code</b></label>
            <input class="textin" type="text" placeholder="Code" name="verify" required>

            <div class="submitbar">
                <button class="login" type="submit">Verify Account</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
