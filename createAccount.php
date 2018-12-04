<!DOCTYPE html>
<html>
<head>
    <title>Create an Account</title>
    <meta charset="utf-8">
    <meta name="author" content="create">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var user = document.forms["accountForm"]["username"].value;
        var email = document.forms["accountForm"]["email"].value;
        var pw = document.forms["accountForm"]["password"].value;
        var pw2 = document.forms["accountForm"]["password2"].value;
        if (!(/^[a-zA-Z0-9]+$/.test(user))) {
            alert("Username must be filled out, characters and digits only.");
            return false;
        }
        else if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }
        else if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
            alert("Password must be filled out, characters and digits only.");
            return false;
        }
        if(pw !== pw2){
            alert("Passwords do not match. Please try again.");
            return false;
        }
        <?php
            // Create connection
            // $conn = new mysqli("localhost", "root", "", "CSCI445") or die($conn->error);
            //
            // // prepare and bind
            // echo "alert(" . isset($_POST['username's]) . ");";
            //
            // $user = $_POST["username"];
            // $pass = $_POST["password"];
            //
            // $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
            // $stmt->bind_param("s", $user);
            //
            // $stmt->execute();
            // $result = $stmt->get_result();
            // $row = $result->fetch_assoc();
            // if($result->num_rows === 0){
            //     $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            //     $stmt->bind_param("ss", $user, $pass);
            //
            //     $stmt->execute();
            //
            //     echo "notifyUser();";
            //     echo "return true;";
            // }
            // else{
            //     echo "alert('This username already exists. Please choose another.');";
            //     echo "return false;";
            // }
            echo "return notifyUser();";

        ?>
    }
    function notifyUser() {
        var email = document.forms["accountForm"]["email"].value;
        alert("An email has been sent to " + email + ". Please check your inbox.");
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="accountForm" action="accountVerification.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Account Creation</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Once an account is created, an email will be sent to activate your account.</p>

            <label class="labe" for="username"><b>Username</b></label>
            <input class="textin" type="text" placeholder="Enter Username" name="username" required>

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>

            <label class="labe" for="psw"><b>Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

            <label class="labe" for="psw2"><b>Re-enter Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password2" required>

            <input type="hidden" name="code" value="<?php echo substr(md5(uniqid(rand(), true)), 16, 16);?>">

            <div class="submitbar">
                <button class="login" type="submit">Create Account</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
