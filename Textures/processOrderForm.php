<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $texture = $_POST["texture"];
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
                    $sql = "INSERT INTO orders (username, texture, model) VALUES ('$username', '$texture', '$model')";
                }
                else
                {
                    header("Location: textures.php"); 
                    exit();
                }


                if ($conn->query($sql) === TRUE) {
                    header("Location: textures.php"); 
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        ?>