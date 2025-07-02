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
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $MyFile = fopen('credenziali.txt', 'a');
        fwrite($MyFile,"\n$Username|$Password");
        fclose($MyFile);
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
</body>
</html>