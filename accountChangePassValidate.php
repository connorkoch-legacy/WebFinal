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
