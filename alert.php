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
    <title>Sorry you're not an admin!</title>
    <link rel="icon" href="img/error-icon-removebg-preview.png">
</head>
<body>
    <center><img src="img/not-allowed.png" style="margin-top: 200px;" width="600"></center>
</body>
</html>