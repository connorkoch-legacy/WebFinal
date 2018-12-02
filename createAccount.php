<!DOCTYPE html>
<html>
<head>
    <title>Weight</title>
    <meta charset="utf-8">
    <meta name="author" content="Weight">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout.css">

    <script>
    function validateForm() {
        var user = document.forms["accountForm"]["username"].value;
        var email = document.forms["accountForm"]["email"].value;
        var pw = document.forms["accountForm"]["password"].value;
        var pw2 = document.forms["accountForm"]["password2"].value;
        if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
            alert("Username must be filled out, characters and digits only.");
            return false;
        }
        else if (!(/\w+@\w+\.\w+/.test(email))) {
            alert("Email must be filled out with correct email syntax");
            return false;
        }
        else if (!(/^[a-zA-Z0-9]+$/.test(pw))) {
            alert("Password must be filled out, characters and digits only.");
            return false;
        }
        if(pw !== pw2){
            alert("Passwords do not match. Please try again.");
            return false;
        }
        <?php
            // Create connection
            $conn = new mysqli("localhost", "root", "", "CSCI445") or die($conn->error);

            // prepare and bind
            $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
            $stmt->bind_param("s", $user);

            $user = $_POST["username"];
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if($result->num_rows === 0){
                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $user, $pass);

                $pass = $_POST["password"];
                $stmt->execute();

                echo "notifyUser();";
                echo "return true;";
            }
            else{
                echo "alert('This username already exists. Please choose another.');";
                echo "return false;";
            }
        ?>
    }
    function notifyUser() {
        var email = document.forms["accountForm"]["email"].value;
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'zixoretii@gmail.com';                 // SMTP username
                $mail->Password = 'utin12345';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('zixoretii@gmail.com', 'Site Name');
                $mail->addAddress($_POST["email"]);     // Add a recipient
                //$mail->addReplyTo('info@example.com', 'Information');

                //Content
                //$mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Verification Code';
                $hasedCode = substr(md5(uniqid(rand(), true)), 16, 16);  //random generated code
                $mail->Body    = 'Your verification code is: ' . $_POST["code"];

                $mail->send();

            } catch (Exception $e) {
                echo "alert('Message could not be sent. Mailer Error: ')";
            }
        ?>

        alert("An email has been sent to " + email + ". Please check your inbox.");
    }
    </script>
</head>
<body>
    <br><br><br><br>
    <form name="accountForm" action="accountVerification.php" method="post" class="loginForm" onsubmit="return validateForm()">
        <div class="container">
            <h2>Account Creation</h2>
            <img src="loginIcon.jpg" alt="image" class="logo">

            <p>Once an account is created, an email will be sent to activate your account.</p>

            <label class="labe" for="username"><b>Username</b></label>
            <input class="textin" type="text" placeholder="Enter Username" name="username" required>

            <label class="labe" for="email"><b>Email</b></label>
            <input class="textin" type="text" placeholder="Enter Email" name="email" required>

            <label class="labe" for="psw"><b>Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password" required>

            <label class="labe" for="psw2"><b>Re-enter Password</b></label>
            <input class="textin" type="password" placeholder="Enter Password" name="password2" required>

            <input type="hidden" name="code" value="<?php echo substr(md5(uniqid(rand(), true)), 16, 16);?>">

            <div class="submitbar">
                <button class="login" type="submit">Create Account</button>
            </div>
            <div class="accountbar">
                <a href="loginPage.php">Return to login</a>
            </div>
        </div>
    </form>
</body>
</html>
