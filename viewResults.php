
<?php
	session_start();
?>

<!DOCTYPE>
<html>

	<head>
		<title>Fitness</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300'rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway'rel='stylesheet' type='text/css'>
		<script>
			function vForm(){
				var dayJ = document.forms["loginForm"]["day"].value;
				document.cookie = "day = "+dayJ;
				<?php
				$servername = "127.0.0.1";
				$username = "jetthy";
				$password = "test";
				$dbname = "f18_jessyliao";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$id = $_SESSION["id"];
				$day = $_COOKIE["day"];

				$sql = "SELECT * FROM lifts WHERE lift_id = $id AND day = \"$day\"";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	$_SESSION["squat"] = $row["squat"];
						$_SESSION["bench"] = $row["bench"];
						$_SESSION["deadlift"] = $row["deadlift"];
						$_SESSION["overheadpress"] = $row["overhead"];
						$_SESSION["pullup"] = $row["pullups"];
				    }
				} else {
				    $_SESSION["squat"] = 0;
					$_SESSION["bench"] = 0;
					$_SESSION["deadlift"] = 0;
					$_SESSION["overheadpress"] = 0;
					$_SESSION["pullup"] = 0;
				}
				$conn->close();
				echo "console.log(\"$day asdf\");";

				?>
				console.log("test");
				return 0;
			}
		</script>
	</head>
	
	<body>
		<div id="wrapper">
			<h1 id="title">TEST V1</h1>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#accountPage.php">Account</a></li>
				</ul>
			</div>
		
			<div id="content">
				<div class="box">
					<?php

						$servername = "localhost";
						$username = "jetthy";
						$password = "test";
						$dbname = "f18_jessyliao";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						}

						$id = $_SESSION["id"];

						$sql = "SELECT * FROM lifts INNER JOIN users ON lifts.lift_id = users.id WHERE id = $id";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    while($row = $result->fetch_assoc()) {
						    	$temp = $row["day"];
						        echo "<p> Date: $temp </p>";
						        echo "<br>";
						    }
						} else {
						    echo "0 results";
						}
						$conn->close();




					?>
					<form name="loginForm" method="post" action="resultClone.php" class="loginForm" onsubmit="return vForm()">
				        
				            <input type="textin" type="text" placeholder="Enter Date" name="day"required>


				            <button type="submit">View Result</button>
				    </form>
				</div>
			</div>
							
			<div id="footer">
				<p>Created by Jessy, Alan, & Connor<a id="logout" href="loginPage.php">Logout</a></p>

			</div>
		</div>
	</body>

</html>