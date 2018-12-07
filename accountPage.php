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
		</script>
	</head>

	<body>
		<div id="wrapper">
			<h1 id="title">Account Page</h1>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#accountPage.php">Account</a></li>
				</ul>
			</div>

			<div id="content">
				<div class="box">
					<a href="viewResults.php">View Past Results</a>
					<br><br>
					<a href="accountChangePass.php">Change Password</a>
				</div>
			</div>

			<div id="footer">
				<p>Created by Jessy, Alan, & Connor<a id="logout" href="loginPage.php">Logout</a></p>

			</div>
		</div>
	</body>

</html>
