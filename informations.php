<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">

</head>
<body>
    <?php
        //writing in the database username and password using PDO (PHP Data Object)
        $Username = $_POST['username'];
        $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //$Password = $_POST['password'];
        try {
            $hostname = '127.0.0.1';
            $dbname = "mydatabse";
            $user = 'root';
            $pass = '';
            $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass); //do not use '', you must use ""
        } catch (PDOException $e) {
            echo "Errore: ".$e->getMessage();
            die();
        }
        $sql = "INSERT INTO people(username, password) VALUES (:username, :password)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $Username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $Password, PDO::PARAM_STR);
        $stmt->execute();
    ?>
    <div class="login-container">
        <div class="header">
            <?php
                echo "Account creato con successo!";
                echo '<a id="created" href="index.php"><button id="bottone">Torna al login</button></a>';
            ?>
        </div>
        <div class="cutie-image">
            <img src="img/astro-removebg-preview.png" alt="astronauta" width="280px">
        </div>
    </div>
    <div class="footer">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" style="font-size:18px;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px;">Logout</a></p>
    </div>
</body>
</html>