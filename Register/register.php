<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cosmic";

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $newUsername = $_POST['newUsername'];
  $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
  $newEmail = $_POST['email'];

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $checkEmailQuery = "SELECT * FROM accounts WHERE email='$newEmail'";
  $resultEmail = mysqli_query($conn, $checkEmailQuery);

  $checkUsernameQuery = "SELECT * FROM accounts WHERE username='$newUsername'";
  $resultUsername = mysqli_query($conn, $checkUsernameQuery);

  if (mysqli_num_rows($resultEmail) > 0) 
  {
      $message = "Error: Email '$newEmail' is already registered.";
  } 
  elseif (mysqli_num_rows($resultUsername) > 0) 
  {
      $message = "Error: Username '$newUsername' is already taken.";
  }
  else 
  {
    $sql = "INSERT INTO accounts (username, password, email) VALUES ('$newUsername', '$newPassword', '$newEmail')";

    if (mysqli_query($conn, $sql)) 
    {
        $message = "User '$newUsername' registered successfully!";
    } 
    else 
    {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="moving-background"></div>
<div class="moving-background2"></div>
  <div class="container">
    <form id="registerForm" action="register.php" method="post">
      <h2>Register</h2>
      <label for="newUsername">Username:</label>
      <input type="text" id="newUsername" name="newUsername" required>
      <label for="email">Email:</label>
      <input type="mail" id="email" name="email" required>
      <label for="newPassword">Password:</label>
      <input type="password" id="newPassword" name="newPassword" required>
      <div style="display: flex; justify-content:space-between; width:100%" >
        <label for="login" class="backToLogin">Already have an account?: <a href="../login/login.php">Login</a></label>
        <label for="null" style="width: 50%;"></label>
      </div>
      <button type="submit" id="lrButton">Register</button>
        <p><?php echo $message; ?></p>

    </form>
  </div>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>


  <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>

  <script src="gsapregister.js"></script>
</body>
</html>
