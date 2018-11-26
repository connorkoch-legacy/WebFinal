<!DOCTYPE html>
<html>
<head>
    <title>Weight</title>
    <meta charset="utf-8">
    <meta name="author" content="Weight">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginCss.css">

    <script>
    function validateForm() {
        var x = document.forms["myForm"]["fname"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }
    </script>
</head>
<body>
    <form name="loginForm" action="index.php" method="post">
        <img src="loginIcon.jpg" alt="image" class="logo">

        <div class="container">
            <label class="labe" for="uname"><b>Username</b></label>
            <input class="textin" type="text" placeholder="Enter Username" name="username" required>

            <label class="labe" for="psw"><b>Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

            <div class="submitbar">
                <button class="login" type="submit">Login</button>
                <label class="check">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <div class="cancelbar" style="background-color:#f1f1f1">
                <a href="#">Create Account</a>
                ---
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </form>
</body>
</html>
