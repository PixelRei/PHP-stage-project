<?php
session_start();
if(!isset($_SESSION['username'])){
    header ("Location: index.php");
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
    <div class="login-container ">
        <div class="panel">
            <div class="info">
                <p class="credentials">Username: <?=$username?></p>
                <p class="credentials">Password: <?=$password?></p>
                <a id="created" href="site.php"><button id="button">Back</button></a>
            </div>
            <div class="change">
                <form method="POST" autocomplete="off">
                <label for="username">Nuovo username:</label>
                <input type="text" name="username" required>
                <label for="password">Nuova password:</label>
                <input type="password" name="password" required>
                <a id="created" href="index.php"><input class="modify_button" id="button" type="submit" name="submit" value="Modifica"></a>
                </form>
            </div>
            <?php   
                if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){ //condition to see if the form was sent correctly
                    
                //update the session
                $new_username = $_POST['username'];
                $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['username'] = $new_username;
                $_SESSION['password'] = $new_password;
                //and also the database
                try {
                    $hostname = '127.0.0.1';
                    $dbname = 'mydatabse';
                    $user = 'root';
                    $pass = '';
                    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                } catch (PDOException $e) {
                    echo "error: ".$e->getMessage();
                    die();
                }
                $sql = "UPDATE people SET username = :username, password = :password WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':username', $new_username, PDO::PARAM_STR);
                $stmt->bindValue(':password', $new_password, PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                }
            ?>
        </div>
    </div>
</body>
</html>