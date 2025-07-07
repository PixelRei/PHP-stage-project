<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
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
        <div class="others">
            <div class="users">
                <select>
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
            </div>
            <a id="created" href="admin-modify.php"><button id ="button">Modifica</button></a>
        </div>
    </div>
</body>
</html>