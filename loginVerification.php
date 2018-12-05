<!DOCTYPE html>
<html>
<head>

<script>
<?php
myqli("f18_connorkoch", "connorkoch", "KQQUYCQG", "CSCI445") or die($conn->error);
// prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $pass);
$user = $_POST["email"];
$pass = $_POST["password"];
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($result->num_rows === 0){
	  echo "window.location = 'loginPage.php'";	
}

?>
</script>
</head>
</html>
