<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Password Reset</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Cosmic";

    $message = '';

    if (isset($_GET['token']) && isset($_GET['email'])) {
        $token = $_GET['token'];
        $userEmail = $_GET['email'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM accounts WHERE email = '$userEmail' AND reset_token = '$token'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $newPassword = $_POST['newPassword'];
                $newpasswordChecker = $_POST['newpasswordChecker'];

                if ($newPassword === $newpasswordChecker) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $sqlUpdate = "UPDATE accounts SET password = '$hashedPassword', reset_token = NULL WHERE email = '$userEmail' AND reset_token = '$token'";
                    $resultUpdate = mysqli_query($conn, $sqlUpdate);

                    if ($resultUpdate) {
                        $message = 'Password successfully updated.';
                    } else {
                        $message = 'Error updating password. Please try again.';
                    }
                } else {
                    $message = 'Passwords do not match.';
                }
            }
        } else {
            $message = 'Invalid token.';
        }

        mysqli_close($conn);
    } else {
        $message = 'Token not provided.';
    }
    ?>

    <div class="moving-background"></div>
    <div class="moving-background2"></div>
    <div class="container">
        <?php if ($message === 'Invalid token.' or $message === 'Token not provided.') : ?>
            <p><?php echo $message; ?></p>
        <?php else : ?>
            <form id="loginForm" action="updatePassword.php?token=<?php echo $token; ?>&email=<?php echo $userEmail; ?>" method="post">
                <h2>Password Reset</h2>
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <label for="newpasswordChecker">Repeat New Password:</label>
                <input type="password" id="newpasswordChecker" name="newpasswordChecker" required>
                <div>
                    <button type="submit" id="lrButton">Reset</button>
                </div>
                <p><?php echo $message; ?></p>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>
    <script src="gsaplogin.js"></script>
</body>
</html>
