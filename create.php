<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/moon-icon.png">
</head>
<body>
	<br><br><br>
    <div class="login-container">
        <div class="modulo">
            <?php
            echo "<h1>Benvenuto!</h1>";
            echo "<p>Inserisci le tue credenziali per creare l'account</p>";
            ?>
            <form action="informations.php" method="POST" autocomplete="off">
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required placeholder="Username"><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required placeholder="Password">
                <br>
                <input id="button" type="submit" value="Create">
            </form>
        </div>
    </div>
	<br><br>
    <div class="alternative">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px;">Logout</a></p>
    </div>
</body>
</html>