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
            <form>
                <ol>
                    <div class="question">
                        <li><label>Film preferito?<input class="input-log" type="text" name="film" required placeholder="Film" style="margin-left: 20px;"></label></li>
                    </div>
                    <div class="radioForm">
                        <li><label style="cursor: default;">Genere musicale preferito?</label></li>
                        <label><input type="radio" name="music" required>Rap</label>
                        <label><input type="radio" name="music" required>Pop</label>
                        <label><input type="radio" name="music" required>Electronic</label>
                        <label><input type="radio" name="music" required>Classic</label>  
                    </div>
                    <div class="radioForm" style="margin-bottom: 0px;">
                        <li><label style="cursor: default;">Sport preferito?</label></li>
                        <label><input type="radio" name="sport" required>Calcio</label>
                        <label><input type="radio" name="sport" required>Badmington</label>
                        <label><input type="radio" name="sport" required>Basket</label>
                        <label><input type="radio" name="sport" required>Atletica</label> 
                    </div>
                </ol>
                <input type="submit" id="button" value="Invia!" style="margin-left: 170px; margin-top: 10px;">
            </form>
        </div>
    </div>
    <br>
    <div class="alternative" style="padding-top: 10px;">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
    </div>
</body>
</html>