<!DOCTYPE>
<html lang="en-US">

<head>
	<title>Fitness</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(	); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway'rel='stylesheet' type='text/css'>

	<script type="text/javascript">
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

<body onload="inactivityTime()">
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
			<form id="frm" action="result.php" method="post" name="frm">
				<div class="box">
					<h1>Enter your Sex, Weight, Height, and age below. </h1>
					<p>This will help us accuratly determine your strength compared to other athletes with your same body type.</p>
					<p>
						<label>Gender:</label>
						<select name="listt">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
						<br>
						<label>Weight:</label> <input type="text" name="weight" required> <br>
						<label>Height:</label> <input type="text" name="height"placeholder="optional"> <input type="text" name="inch"placeholder="optional"> <br>
						<label>Age:</label> <input type="text" name="age" placeholder="optional">
					</p>
				</div>

				<div class="box">
					<h1>Enter your 1 Rep Max below</h1>
					<p>If you compete, put your 95% max to get a more accurate idea of where your strength is at.</p>
					<p>
						<label>Bench:</label> <input type="text" name="bench" required> <br>
						<label>Squat:</label> <input type="text" name="squat" required> <br>
						<label>Deadlift:</label> <input type="text" name="deadlift" required> <br>
						<label>Overhead Press:</label> <input type="text" name="overheadpress" required> <br>
						<label>Pulls up:</label> <input type="text" name="pullup" required>
					</p>
				</div>

				<div class="box">
					<input type="submit" value="Submit"> <input type="reset">
				</div>
			</form>
		</div>

		<script src="radarChart.js"></script>

		<div id="footer">
			<p>Created by Jessy Liao</p>
		</div>
	</div>
</body>
</html>
