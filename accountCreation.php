<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

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
<?php
$conn = new mysqli("127.0.0.1", "root", "", "CSCI445") or die($conn->error);

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?;");
$stmt->bind_param("s", $email);
$email = $_SESSION["email"];
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($result->num_rows !== 0){

	echo "alert('Email is already in use. Redirecting to login page.');";
	echo "window.location = 'loginPage.php';";

}else{

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $pass, $email);
    $user = $_SESSION["user"];
    $pass = $_SESSION["password"];
    $email = $_SESSION["email"];
    $stmt->execute();

	echo "alert('Your account has been created. You may now login.');";
	echo "window.location = 'loginPage.php';";

}

?>

</script>
</head>
<body>

</body>
</html>
