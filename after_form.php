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
    <title>Form Completed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
    <div class="admin-modifies" style="font-size: 30px;">
        <h1>thank you</h1>
        <a href="user-panel.php">Go back</a>
    </div>
    <div class="footer" style="padding-top: 10px;">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
    </div>
</body>
</html>