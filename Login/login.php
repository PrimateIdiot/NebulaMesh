<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cosmic";

$message = '<br>';
$button  = '<button type="button" id="heForgor">Forgot password?</button>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    $filePath = '../loggedInUsers.txt';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT username, password FROM accounts WHERE username = '$inputUsername'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($inputPassword, $row['password'])) 
        {
            $message = '
            <div style="text-align: center;">
              <label>Login successful!</label><br><br>
              <label>Where do you wish to go?</label><br><br>
            </div>
        <nav>
              <ul>
                  <li><a href="../textures/textures.php">Textures</a></li>
                  <li><a href="../models/models.php">Models</a></li>
                  <li><a href="../materials/materials.php">Materials</a></li>
              </ul>
        </nav>
            ';
            $button = '';

            file_put_contents($filePath, $inputUsername . PHP_EOL, FILE_APPEND);

        } else {
            $message = 'Invalid username or password.';
        }
    } else {
        $message = 'Invalid username or password.';
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="moving-background"></div>
<div class="moving-background2"></div>
  <div class="container">
    <form id="loginForm" action="login.php" method="post">
      <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <div style="display: flex; justify-content:space-beetween; width:100%" >
        <label for="register" class="backToReg">Don't have an account?: <a href="../register/register.php">Register</a></label>
        <label for="null" style="width: 50%;"></label>
      </div>
      <div>
        <button type="submit" id="lrButton">LogIn</button>
        <?php echo $button; ?>
      </div>
      <p><?php echo $message; ?></p>
    </form>
  </div>
  
  <div class="container" id="resetBox">
    <form id="passwordReset" action="passwordReset.php" method="get">
      <label for="username">Email:</label>
      <input type="mail" id="mail" name="mail" required>
      <button type="submit" id="resetPw">Send</button>
        <p id="messageDisplay"></p>
    </form>
  </div>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>


  <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>

  <script src="gsaplogin.js"></script>
</body>
</html>
