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
        <title>Official Site</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/moon-icon.png">

    </head>
    <body>
        <div class="error">
            <?php
                $username = $_POST['username'];
                $password = $_POST['password'];
                if($username != 'admin' && $password != 'admin127001'){
                    try {
                        $hostname = '127.0.0.1';
                        $dbname = 'mydatabse';
                        $user = 'root';
                        $pass = '';
                        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8mb4", $user, $pass);
                    } catch (PDOException $e) {
                        echo "Errore: ".$e->getMessage();
                        die();
                    };
                    $sql = 'SELECT id, username, password FROM people WHERE username = :username';
                    $stmt = $db->prepare($sql);
                    $stmt->execute([
                        'username' => $username
                    ]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC); //recupera il risultato della query
                    //controllo se l'array esiste, e verifica della password hashata
                    //l'utente è gia stato controllato a livello database con la query (WHERE)
                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        $_SESSION['id'] = $user['id'];
                        include 'inside.php';
                    } else {
                        echo "Credenziali errate.";
                        echo '<a id="created" href="index.php"><button id="bottone">Torna al login</button></a>';
                    }
                }else{
                    header("Location: admin.php");
                }
            ?>
        </div>
    </body>
    </html>