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
                //getting the informations from the database
                $username = $_POST['username'];
                $password = $_POST['password'];
                try {
                    $hostname = '127.0.0.1';
                    $dbname = 'mydatabse';
                    $user = 'root';
                    $pass = '';
                    $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8mb4", $user, $pass);
                } catch (PDOException $e) {
                    echo "Errore: ".$e->getMessage();
                    die();
                }
                $sql = 'SELECT username, password FROM utenti';
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $found = false;

                //using fetch
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if($username == $row['username'] && $row['password']){
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