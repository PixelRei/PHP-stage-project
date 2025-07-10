<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - View Form Results</title>
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
            $sql = "SELECT username, film, music, sport FROM questionario";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        ?>
    <div class="inside-container">
            <h1>Risposte degli utenti al questionario</h1>
            <hr>
            <table style="width:70%">
                <tr>
                    <th>USERNAME</th>
                    <th>FILM</th>
                    <th>MUSIC</th>
                    <th>SPORT</th>
                </tr>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <?php if($row['username'] != 'admin'): ?>
                            <tr>
                                <td> <?= $row['username'] ?></td>
                                <td><?=$row['film'] ?></td>
                                <td><?=$row['music']?></td>
                                <td><?=$row['sport']?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endwhile; ?>
            </table>
            <a id="created" href="admin-panel.php"><button id="button">Indietro</button></a>
        </div>
        <div class="footer" style="padding-top: 10px;">
            <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
        </div>
</body>
</html>