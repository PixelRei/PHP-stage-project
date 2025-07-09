<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header ("Location: index.php");
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    //getting data from database
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
    $sql = 'SELECT id, username, password, active, admin FROM people WHERE username = :username';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'username' => $username
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); //getting the result of the query
    //controlling if array already exists, and then verify the hashed password
    //user has already been checked at a database level with the previous query (using WHERE)

    if(password_verify($password, $user['password']) && $user['admin'] !== 0 && $user['active'] != 0){
        $_SESSION['username'] = $username;
        header("Location: admin-panel.php");
        exit;
    }elseif($user && password_verify($password, $user['password']) && $user['active'] != 0 && $user['admin'] == 0) { //verifying if the associative array exists, then checking tha password and status (if activated or not)
            $_SESSION['username'] = $username;
            header('Location: user-panel.php');
            exit;
        }else{
            header("Location: login_error.php");
            exit;
        }
?>