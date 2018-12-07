
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<script>
<?php
$conn = new mysqli("localhost", "root", "", "CSCI445");
// prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?;");
$stmt->bind_param("ss", $email, $pass);
$email = $_POST["email"];
$pass = $_POST["password"];
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$_SESSION["login"] = "false";

if($result->num_rows === 0){

	echo "alert('Incorrect email or password. Try again.');";
	echo "window.location = 'loginPage.php';";

}else{

	$_COOKIE['email'] = $_POST["email"];
	$_COOKIE['pass'] = $_POST["password"];

	$_SESSION["login"] = "true";
	$_SESSION["id"] = $row["id"];
	$_SESSION["user"] = $row["username"];
	$_SESSION["email"] = $_POST["email"];

	echo "window.location = 'index.php';";

}

?>
</script>
</head>
<body>

</body>
</html>
