<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="styleTextures.css">
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
            $dbname = "Cosmic";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM textures";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="image-container">';
                        echo '<img src="' . $row['image_link'] . '" alt="' . $row['texture_name'] . '">';
                        echo '<div class="text-container">';
                            echo '<h2>' . $row['texture_name'] . '</h2>';
                            echo '<h3>by ' . $row['username'] . '</h3>';
                        echo '</div>';
                        echo '<div class="desc-container">';
                            echo '<p>' . $row['description'] . '</p>';
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

    <section id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form id="objectForm" action="processOrderForm.php" method="post" onsubmit="return validateForm()">
            <h2 id="textureName" name="textureName"></h2> 
            <br>
            <br>
            <img id="modalImage" src="" alt="Enlarged Image">
            <div class="ratio-box">
                <label for="objectRadio">What model do you prefer for this texture?:</label>
                <div class="radioBoxBox">
                    <input type="radio" id="ratio1" name="objectRadio" value="Machine">
                    <label for="ratio1">Machine</label>
                    <br>
                    <input type="radio" id="ratio2" name="objectRadio" value="Glass">
                    <label for="ratio2">Glass</label>
                    <br>
                    <input type="radio" id="ratio3" name="objectRadio" value="Island">
                    <label for="ratio3">Island</label>
                    <br>
                    <input type="radio" id="ratio4" name="objectRadio" value="Pillow">
                    <label for="ratio4">Pillow</label>
                    <br>
                    <input type="radio" id="ratio5" name="objectRadio" value="Room">
                    <label for="ratio5">Room</label>
                    <br>
                    <input type="radio" id="ratio6" name="objectRadio" value="Frog">
                    <label for="ratio6">Frog</label>
                </div>
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($loggedInUser); ?>">
                <input type="hidden" name="texture" id="textureInput" value="">
                <br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>


    <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>


    <script src="scriptTextures.js"></script>
    <script src="gsapTextures.js"></script>
</body>
</html>