<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php
    if($_SESSION['login'] == "false"){ //if login in session is not set
        header("Location: loginPage.php");
    }
?>

	<head>
		<title>Fitness</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway'rel='stylesheet' type='text/css'>

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
		        var pw = document.forms["passChangeForm"]["password"].value;
		        var pw2 = document.forms["passChangeForm"]["password2"].value;
		        if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
		            alert("Password must be filled out, characters and digits only.");
		            return false;
		        }
		        if(pw !== pw2){
		            alert("Passwords do not match. Please try again.");
		            return false;
		        }

		        document.cookie = "pass = "+pw;

		    }

		</script>
	</head>

	<body>
		<div id="wrapper">
			<h1 id="title">Account Change</h1>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="accountPage.php">Account</a></li>
				</ul>
			</div>

			<div id="content">
				<div class="box">

					<form name="passChangeForm" action="accountChangePassValidate.php" method="post" class="loginForm" onsubmit="return validateForm()">

					<label class="labe" for="psw"><b>Password</b></label>
		            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

		            <br>

		            <label class="labe" for="psw2"><b>Re-enter Password</b></label>
		            <input class="textin" type="password" placeholder="Enter Password" name="password2" required>

		            <div class="submitbar">
		                <button class="login" type="submit">Change Password</button>
		            </div>

		            </form>
				</div>
			</div>

			<div id="footer">
				<p>Created by Jessy Liao</p>
			</div>
		</div>
	</body>

</html>
