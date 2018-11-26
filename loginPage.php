<!DOCTYPE html>
<html>
<head>
    <title>Weight</title>
    <meta charset="utf-8">
    <meta name="author" content="Weight">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var x = document.forms["loginForm"]["username"].value;
        if (x == ) {
            alert("Name must be filled out");
            return false;
        }
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="loginForm" action="index.php" method="post" class="loginForm">
        <div class="container">
            <h2>Sign In</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>

            <label class="labe" for="psw"><b>Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

            <div class="submitbar">
                <button class="login" type="submit">Login</button>
                <label class="check">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <div class="accountbar">
                <a href="#">Create Account</a>
                ---
                <a href="#">Forgot Password?</a>
            </div>
        </div>
    </form>
</body>
</html>
