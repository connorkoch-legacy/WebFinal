
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <meta charset="utf-8">
    <meta name="author" content="reset">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">
	
    <script>
	<?php
	
	$conn = new mysqli("localhost", "root", "", "CSCI445");
	$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?;");
	$stmt->bind_param("s", $email,);
	$email = $_POST["email"];
	$stmt->execute();
	
	if($result->num_rows === 0){

		echo "alert('Incorrect email. Please try again.');";
		echo "window.location = 'loginPage.php';";

	}else{
		
		$_SESSION['email'] = $_POST['email'];
		$msg = "Your verification code is: " . $_POST["code"];
		$msg = wordwrap($msg,70);
		mail($_POST["email"],"Verification Code",$msg);
		
	}
    ?>

	notifyUser();
	
    function validateForm() {
       
        if(password !== password2){
            alert("Passwords do not match. Please try again.");
            return false;
        }
		 if(document.forms["pwForm"]["verify"].value !== '<?php echo $_POST["code"]?>'){
            alert("Code does not match. Please try again.");
            return false;
        }

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
            <h2>Reset Password</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Enter your code and a new password.</p>
			
            <label class="labe" for="verify"><b>Verification Code</b></label>
            <input class="textin" type="text" placeholder="Code" name="verify" required>
			
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
