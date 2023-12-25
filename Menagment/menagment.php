<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ORDER! ORDER!</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="stylesheet" href="menagment.css">
</head>
<body>
<div class="moving-background"></div>
<div class="moving-background2"></div>
    <form id="loginForm" action="delete_orders.php" method="post">
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Cosmic";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $query = "SELECT * FROM orders";
      $result = mysqli_query($conn, $query);

      echo '<div class="container">';
      echo '<form id="loginForm" action="delete_orders.php" method="post">';

      echo '<h2>Orders</h2>';
      echo '<div class="order-container">';

      while ($row = mysqli_fetch_assoc($result)) {

          echo '<div class="order-box">';
          echo '<div class="order-info">';
          echo '<strong>Order ID:</strong> ' . $row['order_id'] . '<br>';
          echo '<strong>Username:</strong> ' . $row['username'] . '<br>';
          if ($row['material'] != '') {
              echo '<strong>Material:</strong> ' . $row['material'] . '<br>';
          }
          if ($row['texture'] != '') {
              echo '<strong>Texture:</strong> ' . $row['texture'] . '<br>';
          }
          echo '<strong>Model:</strong> ' . $row['model'] . '<br>';
          echo '</div>';

          echo '<div class="styled-checkbox" onclick="toggleCheckbox(this)">';
          echo '<div class="checkmark">✓</div>';
          echo '<input type="checkbox" name="order_ids[]" value="' . $row['order_id'] . '">';
          echo '</div>';

          echo '</div>';
      }
      echo '</div>';

      echo '<div class="button-holder">';
      echo '<button type="submit" name="deleteOrders">Order Completed</button>';
      echo '</div>';
      echo '</form>';
      echo '</div>';

      mysqli_close($conn);
    ?>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>


  <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>

  <script src="gsapmenagment.js"></script>
</body>
</html>
