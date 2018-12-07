<?php
	session_start();
?>
<!DOCTYPE>
<html>
<?php
	if($_SESSION['login'] == "false"){ //if login in session is not set
		header("Location: loginPage.php");
	}
?>
<?php

	$conn = new mysqli("127.0.0.1", "root", "", "CSCI445") or die($conn->error);

	$stmt = $conn->prepare("INSERT INTO lifts (lift_id, day, bench, squat, deadlift, overhead, pullups) VALUES (?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("isiiiii", $id, $date, $bench, $squat, $deadlift, $overheadpress, $pullup);
	$id = $_SESSION["id"];
	$date = date('Y-m-d H:i:s');
	$bench = $_POST["bench"];
	$squat = $_POST["squat"];
	$deadlift = $_POST["deadlift"];
	$overheadpress = $_POST["overheadpress"];
	$pullup = $_POST["pullup"];
	if(!$stmt->execute()){
		echo "Error loading data into database.";
	}
	$stmt2 = $conn->prepare("UPDATE users SET `weight` = ?, `gender` = ? WHERE `id` = ?;");
	$stmt2->bind_param("isi", $weight, $gender, $id);
	$weight = $_POST["weight"];
	$gender = $_POST["listt"];
	if(!$stmt2->execute()){
		echo "Error loading data into database.2";
	}


?>


	<head>
		<title>Fitness</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="layout.css?<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

		<!-- D3.js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js" charset="utf-8">
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

			<h1 id="title">TEST V1</h1>

			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="accountPage.php">Account</a></li>
				</ul>
			</div>

			<div id="content">
				<div class="box">
					<div class="radarChart"></div>

					<script src="radarChart.js"></script>
					<script>
						//////////////////////////////////////////////////////////////
						//////////////////////// Set-Up //////////////////////////////
						//////////////////////////////////////////////////////////////

						var margin = {top: 100, right: 100, bottom: 100, left: 100},
						width = Math.min(700, window.innerWidth - 10) - margin.left - margin.right,
						height = Math.min(width, window.innerHeight - margin.top - margin.bottom - 20);
						//-----------------------------------------------
						 <?php $list = $_POST['listt'];?>

						var i = 1;

						var name = "<?php echo $_SESSION["user"];?>";
						var gender = "<?php echo $list?>";
						var weight = <?php echo $_POST["weight"];?>;
						var heightt = "<?php echo $_POST["height"];?>";
						var age = "<?php echo $_POST["age"];?>";


						var squat;
						var bench;
						var deadlift;
						var ohp;
						var pullup;

						var insquat = <?php echo $_POST["squat"];?>;
						var inbench = <?php echo $_POST["bench"];?>;
						var indeadlift = <?php echo $_POST["deadlift"];?>;
						var inohp = <?php echo $_POST["overheadpress"];?>;
						var inpullup = <?php echo $_POST["pullup"];?>;
						//-----------------------------------------------
						if(gender == "male"){
							if(165>=weight){
								squat = 610;
								deadlift = 760;
								bench = 485;
								ohp = NaN;
								pullup = NaN;
							}else if(181>=weight){
								squat = 749;
								deadlift = 791;
								bench = 556;
								ohp = NaN;
								pullup = NaN;
							}else if(198>=weight){
								squat = 804;
								deadlift = 881;
								bench = 565;
								ohp = NaN;
								pullup = NaN;
							}//else... still in progress...
						}else{
							if(114>=weight){
								squat = 340;
								deadlift = 408;
								bench = 233;
								ohp = NaN;
								pullup = NaN;
							}else if(123>=weight){
								squat = 369;
								deadlift = 454;
								bench = 275;
								ohp = NaN;
								pullup = NaN;
							}else if(132>=weight){
								squat = 451;
								deadlift = 485;
								bench = 300;
								ohp = NaN;
								pullup = NaN;
							}//else... still in progress...
						}

						squat = insquat/squat;
						bench = inbench/bench;
						deadlift = indeadlift/deadlift;
						ohp = .58;//inohp/ohp;
						pullup = .326;//inpullup/pullup;


						//////////////////////////////////////////////////////////////
						////////////////////////// Data //////////////////////////////
						//////////////////////////////////////////////////////////////

						var LegendOptions = ['Banana','Apple','Dragon'];

						var data = [
								[
								{axis:"Squat",value:squat},
								{axis:"Bench",value:bench},
								{axis:"Deadlift",value:deadlift},
								{axis:"Overhead Press",value:ohp},
								{axis:"Pull up",value:pullup}
								]
						 		];

						//////////////////////////////////////////////////////////////
						//////////////////// Draw the Chart //////////////////////////
						//////////////////////////////////////////////////////////////

						var color = d3.scale.ordinal()
						.range(["#7DCE94","#402785","#0E91A1"]);
						//Green, purp ,darkblu
						var radarChartOptions = {
							w: width,
							h: height,
							margin: margin,
							maxValue: 1,
							levels: 10,
							roundStrokes: false,
							color: color
						};
						//Call function to draw the Radar chart
						RadarChart(".radarChart", data, radarChartOptions);


						</script>
				</div>

				<div class="box">
					<div id="colorBox"></div>
					<p id="colorBoxLegend"></p>
					<script>
						//////////////////////////////////////////////////////////////
						//////////////////////////// Legend //////////////////////////
						//////////////////////////////////////////////////////////////
						document.getElementById("colorBoxLegend").innerHTML = " "+name;
					</script>


				</div>

				<div class="box">
					<p id="program"></p>
					<script>
						//////////////////////////////////////////////////////////////
						//////////////////// Recommended Programs ////////////////////
						//////////////////////////////////////////////////////////////

						if(bench>deadlift && bench>squat){
							document.getElementById("program").innerHTML = "Work on your squat and deadlift";
						}else if(deadlift>bench && deadlift>squat){
							document.getElementById("program").innerHTML = "Work on your chest and squat";
						}else{
							document.getElementById("program").innerHTML = "Work on your chest and deadlift";
						}



					</script>

				</div>
			</div>

			<div id="footer">
				<p>Created by Jessy Liao, Connor Koch, Alan Son</p>
			</div>
		</div>
	</body>

</html>
