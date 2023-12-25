<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cosmic";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['deleteOrders'])) {
    $selectedOrderIds = $_POST['order_ids'];

    foreach ($selectedOrderIds as $orderId) {
        $deleteQuery = "DELETE FROM orders WHERE order_id = $orderId";
        $conn->query($deleteQuery);
    }

    header("Location: menagment.php"); 
    exit();
}

$conn->close();
?>
