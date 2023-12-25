<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $material = $_POST["material"];
                $model = $_POST["objectRadio"];

                $servername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "cosmic";

                $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if($username != '')
                {
                    $sql = "INSERT INTO orders (username, material, model) VALUES ('$username', '$material', '$model')";
                }
                else
                {
                    header("Location: materials.php"); 
                    exit();
                }


                if ($conn->query($sql) === TRUE) {
                    header("Location: materials.php"); 
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        ?>