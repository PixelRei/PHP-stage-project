<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: index.php");
        exit;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'admin' && $password == 'admin127001'){
        header("Location: admin.php");
        exit;
    }else{
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
            header('Location: inside.php');
            exit;
        } else {
            header("Location: login_error.php");
            exit;
        }
    }
?>