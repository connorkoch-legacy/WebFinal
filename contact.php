<!DOCTYPE>
<html>

	<head>
		<title>Fitness</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
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
				<form> <!-- Have this link to a thank you page -->
					<div class="box">
						<p>
							<label>Name:</label> <input type="text" name="name" required> <br>
							<label>Email:</label> <input type="text" name="email" required> 
						</p> 
					</div>
					<div class="box">
						<p>Write comments/questions below: <br>
						<textarea></textarea>
						</p>
						<input type="submit" value="Submit"> <input type="reset">
					</div>
				</form>
			</div>
		
			<div id="footer">
				<p>Created by Jessy Liao</p>
			</div>
		</div>
	</body>

</html>