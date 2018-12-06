<!DOCTYPE>
<html>

	<head>
		<title>Fitness</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway'rel='stylesheet' type='text/css'>

		<script>
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
		        <?php
		            $pass = $_COOKIE['pass'];
		            setcookie("pass",$pass,time()+(86400*30),"/");
		        ?>


		        //QUERY DATABASE AND UPDATE THE PASSWORD TO NEW PASSWORD
		        
		    }

		</script>
	</head>
	
	<body>
		<div id="wrapper">
			<h1 id="title">TEST V1</h1>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
		
			<div id="content">
				<div class="box">

					<form name="passChangeForm" action="index.php" method="post" class="loginForm" onsubmit="return validateForm()">

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