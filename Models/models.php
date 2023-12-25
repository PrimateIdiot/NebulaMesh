<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="styleModels.css">
</head>

<body>
    <div class="moving-background"></div>
    <header>
        <div class="logo-container">
            <a href="../index/index.php">
                <div class="cloud-text">NebulaMesh</div>
            </a>
        </div>
        <div class="userInfo">
            <?php
                $filePath = '../loggedInUsers.txt';

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
                    file_put_contents($filePath, "");
                }

                if (file_exists($filePath)) {
                    $usernames = file($filePath, FILE_IGNORE_NEW_LINES);
                    $loggedInUser = end($usernames);
                }

                if (!empty($loggedInUser)) {
                    echo '<div class="loggedInAs">Logged in as: <div class="colorName">' . htmlspecialchars($loggedInUser) . '</div></div>';
                    echo '<form action="" method="post">';
                    echo '<button type="submit" name="logout" class="logout-button">Logout</button>';
                    echo '</form>';
                }
                else
                {
                    echo '<div class="notLoggedIn">Not logged in. <a href="../login/login.php">Log in</a></div>';
                }
            ?>
        </div>
        <nav>
            <ul>
                <li><a href="../textures/textures.php">Textures</a></li>
                <li><a href="../models/models.php">Models</a></li>
                <li><a href="../materials/materials.php">Materials</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cosmic";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM models";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="image-container">';
                        echo '<img src="' . $row['image_link'] . '" alt="' . $row['model_name'] . '">';
                        echo '<div class="text-container">';
                            echo '<h2>' . $row['model_name'] . '</h2>';
                            echo '<h3>by ' . $row['username'] . '</h3>';
                        echo '</div>';
                    echo '</div>';
                }
            } 
            else 
            {
                echo "0 results";
            }

            mysqli_close($conn);
        ?>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>


    <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>


    <script src="scriptModels.js"></script>
    <script src="gsapModels.js"></script>
</body>
</html>