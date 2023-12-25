<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cosmic";

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userEmail = $_GET['mail'];
    echo($userEmail);

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $token = bin2hex(random_bytes(32));

    $sql = "UPDATE accounts SET reset_token = '$token' WHERE email = '$userEmail'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'NebulaMesh@gmail.com';
        $mail->Password = 'ppnobxgfprgqiauu';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 25; //If not working use 465, 587, 2525 or 8025

        $mail->setFrom('NebulaMesh@gmail.com');
        $mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body = "To reset your password, click the following link: 
                        <a href='http://localhost/Cosmic/login/updatePassword.php?token=$token&email=$userEmail'>Reset Password</a>";

        if ($mail->send()) {
            $message = 'Password reset instructions sent to your email.';
            header("Location: login.php?reset=success&email=$userEmail");
            exit();
        } else {
            $message = 'Error sending email. Please try again.';
        }
    } else {
        $message = 'Error generating reset token.';
    }

    mysqli_close($conn);
}
?>
</body>
</html>
