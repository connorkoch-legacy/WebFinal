<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <meta charset="utf-8">
    <meta name="author" content="reset">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var user = document.forms["pwForm"]["username"].value;
        var email = document.forms["accountForm"]["email"].value;
        var pw = document.forms["pwForm"]["password"].value;
        var pw2 = document.forms["pwForm"]["password2"].value;
		
        if (!(/^[a-zA-Z0-9]+$/.test(user))) {
            alert("Username must be filled out, characters and digits only.");
            return false;
        }
        else if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
            alert("Password must be filled out, characters and digits only.");
            return false;
        }
        else if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }
        if(pw !== pw2){
            alert("Passwords do not match. Please try again.");
            return false;
        }
		if (<?php
		
			$conn = new mysqli("f18_connorkoch", "connorkoch", "KQQUYCQG", "CSCI445") or die($conn->error);
           
            $user = $_POST["username"];
            
            $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
			
            $email = $_POST["email"];
			
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result2 = $stmt->get_result();
			
            if($result->num_rows !== 0 && $result2->num_rows !== 0){
				echo "false";
            }
            else{
				echo "true";
            }
			?>
		){
			
			alert("Username does not exist. Enter in a valid username.");
			return false;
			
		}
		
		<?php
			
			$conn = new mysqli("f18_connorkoch", "connorkoch", "KQQUYCQG", "CSCI445") or die($conn->error);
				
			$stmt = $conn->prepare("UPDATE users SET password='" . $_POST["password"] ."' WHERE username='" . $_POST["username"] . "' AND email='" . $_POST["email"] . "'");
			$stmt->execute();
				
		?>
		
		alert("Password has been changed.");
		return true;
		
    }
	
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="pwForm" action="loginPage.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Reset Password</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter your username and a new password.</p>

            <label class="labe" for="username"><b>Username</b></label>
            <input class="textin" type="text" placeholder="Enter Username" name="username" required>

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>
			
            <label class="labe" for="psw"><b>New Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

            <label class="labe" for="psw2"><b>Re-enter New Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password2" required>
			
            <div class="submitbar">
                <button class="login" type="submit">Reset</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
