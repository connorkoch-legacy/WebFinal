<!DOCTYPE html>
<html>
<head>

<script>
<?php
    $pass = $_COOKIE['pass'];
    setcookie("pass",$pass,time()+(86400*30),"/");

    $user = $_COOKIE['user'];
    $email = $_COOKIE['email'];
    $conn = new mysqli("localhost", "root", "", "CSCI445");
    // prepare and bind
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ? AND email = ?;");
    $stmt->bind_param("sss", $pass, $user, $email);
    if($stmt->execute()){
        echo "alert('Password Changed.');";
        echo "window.location = 'index.php';";
    } else {
        echo "alert('Error loading data into database.');";
    }
?>
</script>
</head>
<body>

</body>
</html>
