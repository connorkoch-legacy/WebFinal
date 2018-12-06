
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<script>
<?php
$conn = new mysqli("localhost", "root", "", "CSCI445") or die($conn->error);

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

	echo "window.location = 'loginPage.php';";

}

?>

</script>
</head>
<body>

</body>
</html>
