<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Site</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">

</head>
<body>
    <div class="login-container">
        <?php
            $username = $_POST['username'];
            $password = $_POST['password'];
            $contenuto = file("credenziali.txt");
            $found = false;
            for($i=0; $i<count($contenuto); $i++){
                $stringa = explode("|", $contenuto[$i]);
                $utente = trim($stringa[0]);
                $passaparola = trim($stringa[1]);
                if($username == $utente && $password == $passaparola){
                    $found = true;
                    break;
                }
            }
            if($found == true){
                echo "Accesso riuscito!";
            }else{
                echo "Account non esistente!";
            }
        ?>
    </div>
</body>
</html>