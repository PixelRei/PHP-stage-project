<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    if($_SESSION['admin'] == 0){
        header("location: alert.php");
        exit;
    }
    $username = '';
    $value = 0;
    if(isset($_GET['user'])){
        $username = htmlspecialchars($_GET['user']);
        $_SESSION['abc'] = $username;
    }elseif(isset($_GET['username'])){
        $username = $_GET['username'];
    }else{
        echo "utente non riconosciuto";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/moon-icon.png">
    </head>
    <body>
        <br><br><br>
        <div class="admin-modifies">
            <div class="info">
                <p id="user" class="credentials" style="text-align: left;">User selezionato: <b><?=$username?></b></p>
            </div>
            <form action="" method="POST" autocomplete="off">
                <div class="admin-changes">
                        <label for="username">Nuovo username:  <input class="input-log" type="text" name="username" required placeholder="New Username"></label>
                        <label for="password">Nuova password:  <input class="input-log" type="password" name="password" required placeholder="New Password"></label>
                    <div class="status">
                        <?php
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
                            $sql = "SELECT active, admin FROM people WHERE username = :username";
                            $stmt = $db->prepare($sql);
                            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>Attiva/Disattiva account:</p>
                        <?php if($row['active'] == 0): ?>
                            <label><input type="radio" name="stato" value="1">Attiva</label>
                            <label><input type="radio" checked name="stato" value="0">Disattiva</label>
                        <?php else: ?>
                            <label><input type="radio" checked name="stato" value="1">Attiva</label>
                            <label><input type="radio" name="stato" value="0">Disattiva</label>
                        <?php endif; ?>
                    </div>
                    <div class="status">
                        <p>Attiva/Disattiva admin:</p>
                        <?php if($row['admin'] == 0): ?>
                            <label><input type="radio" name="admin" value="1">Attiva</label>
                            <label><input type="radio" checked name="admin" value="0">Disattiva</label>
                        <?php else: ?>
                            <label><input type="radio" checked name="admin" value="1">Attiva</label>
                            <label><input type="radio" name="admin" value="0">Disattiva</label>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="submit" name="submit" value="Modifica" id="button" style="margin-left: 170px;">
            </form>
        </div>
        <?php   
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){ //condition to see if the form was sent correctly
            $new_username = $_POST['username'];
            $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['username'] = $new_username;
            $old_username = $_SESSION['abc'];
            $status = $_POST['stato'];
            $admin = $_POST['admin'];
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
            $sql = "UPDATE people SET username = :username, password = :password, active = :active, admin = :admin WHERE username = :old_username";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':username', $new_username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $new_password, PDO::PARAM_STR);
            $stmt->bindValue(':active', $status, PDO::PARAM_STR);
            $stmt->bindValue(':admin', $admin, PDO::PARAM_STR);
            $stmt->bindValue(':old_username', $old_username, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: inside.php");
            exit;
            }
        ?>
        <br><br>
        <div class="alternative" style="padding-top: 10px;">
            <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
        </div>
    </body>
</html>