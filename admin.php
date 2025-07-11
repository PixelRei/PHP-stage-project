<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    if($_SESSION['admin'] == 0){
        header("location: alert.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Modify Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
    <?php
        try {
            $hostname = '127.0.0.1';
            $dbname = 'mydatabse';
            $user = 'root';
            $pass = '';
            $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $sql = "SELECT username FROM people";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    ?>
    <div class="admin-panel">
        <div class="header">
            <h1>Utenti modificabili</h1>
        </div>
        <div class="wall">
            <div class="others">
                <div class="users">
                    <form action="admin-modify.php" method="GET">
                        <label>Selezionane uno da modificare:</label>
                        <select id="options" name="user">
                            <?php
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    if($row['username'] != 'admin'){
                                        echo "<option>";
                                        echo $row['username'];
                                        echo "</option>";
                                    }
                                }
                            ?>
                        </select>
                        <input class="modifier" id ="button" type="submit" value="Modifica" style="margin-left: 20px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="padding-top: 10px;">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
    </div>
</body>
</html>