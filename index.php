<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Site</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
    <div class="login-container">
        <div class="header">
            <?php
            echo "<h1>Benvenuto!</h1>";
            echo "<p>Effettua il login per poter accedere al sito</p>";
            ?>
        </div>
        <div class="modulo">
            <form action="site.php" method="POST" autocomplete="off">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required>
                <br> 
                <input id="button" type="submit" value="Login"> 
            </form>
            <a id="option" href="create.php">Non hai un account? Crealo!</a>
        </div>
    </div>
</body>
</html>