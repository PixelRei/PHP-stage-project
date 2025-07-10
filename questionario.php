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
    <title>User Panel - Form Compilation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
    <br><br><br><br><br><br>
    <div class="admin-modifies" style="font-size: 30px;">
        <div class="header"><h1 style="font-size: 37px;">Benvenuto nel questionario per utenti</h1></div>
        <div class="status">
            <form action="" method="POST" autocomplete="off">
                <ol>
                    <div class="question">
                        <li><label>Film preferito?<input class="input-log" type="text" name="film" required placeholder="Film" style="margin-left: 20px;"></label></li>
                    </div>
                    <div class="radioForm">
                        <li><label style="cursor: default;">Genere musicale preferito?</label></li>
                        <label><input type="radio" name="music" value="Rap" required>Rap</label>
                        <label><input type="radio" name="music" value="Pop" required>Pop</label>
                        <label><input type="radio" name="music" value="Electronic" required>Electronic</label>
                        <label><input type="radio" name="music" value="Classic" required>Classic</label>  
                    </div>
                    <div class="radioForm" style="margin-bottom: 0px;">
                        <li><label style="cursor: default;">Sport preferito?</label></li>
                        <label><input type="radio" name="sport" value="Calcio" required>Calcio</label>
                        <label><input type="radio" name="sport" value="Badmington" required>Badmington</label>
                        <label><input type="radio" name="sport" value="Basket" required>Basket</label>
                        <label><input type="radio" name="sport" value="Atletica" required>Atletica</label> 
                    </div>
                </ol>
                <input type="submit" name="submit" id="button" value="Invia!" style="margin-left: 50px;">
            </form>
        </div>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){ //always put this condition to avoid submit problems
            $username = $_SESSION['username'];
            $film = $_POST['film'];
            $music = $_POST['music'];
            $sport = $_POST['sport'];
            try {
            $hostname = '127.0.0.1';
            $dbname = 'mydatabse';
            $user = 'root';
            $pass = '';
            $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8mb4", $user, $pass);
            } catch (PDOException $e) {
                echo "Errore: ".$e->getMessage();
                die();
            };
            $sql = "INSERT INTO questionario(username, film, music, sport) VALUES (:username, :film, :music, :sport)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
            $stmt->bindValue(':film', $film, PDO::PARAM_STR);
            $stmt->bindValue(':music', $music, PDO::PARAM_STR);
            $stmt->bindValue(':sport', $sport, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: after_form.php");
            exit;
        }
    ?>
    <br>
    <div class="alternative" style="padding-top: 10px;">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
    </div>
</body>
</html>