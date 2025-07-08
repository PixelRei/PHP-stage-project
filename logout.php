<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}else{
    //destroying the session
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="info">
            <h1>logout effettuato</h1>
            <a id="created" href="index.php"><button id="button">Torna al login</button></a> 
        </div>
    </div>
</body>
</html>