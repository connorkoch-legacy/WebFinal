
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<script>
<?php
$conn = new mysqli("localhost", "root", "", "CSCI445");

$pass = $_POST['password'];

$stmt = $conn->prepare("UPDATE users SET password = $pass WHERE email = ?;");
$stmt->bind_param("s", $email);

$email = $_SESSION['email'];

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo "alert('Password has been changed. Please log in.');";
echo "window.location = 'loginPage.php';";

?>
</script>
</head>
<body>

</body>
</html>
