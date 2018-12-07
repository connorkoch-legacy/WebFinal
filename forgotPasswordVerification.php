<?php
session_start();
?>
<!DOCTYPE>
<html>

<head>

    <script>
    <?php
    $conn = new mysqli("localhost", "root", "", "CSCI445");

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?;");
    $stmt->bind_param("ss", $pass, $email);

    $pass = $_POST['password'];
    $email = $_SESSION['email'];

    $stmt->execute();

    echo "alert('Password has been changed.');";
    echo "window.location = 'loginPage.php';";

    ?>
</script>
</head>
<body>

</body>
</html>
