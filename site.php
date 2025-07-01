<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sito Ufficiale</title>
    <link rel="icon" href="img/icon-removebg-preview.png">

</head>
<body>
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $contenuto = file("credenziali.txt");
        for($i=0; $i<count($contenuto); $i++){
            echo $contenuto[$i]."<br>";
        }
        echo "le tue credenziali sono username: $username e password: $password\n";
    ?>
</body>
</html>