<?php
    session_start();
    $status = $_POST['stato'];
    try {
        $hostname = '127.0.0.1';
        $dbname = 'mydatabse';
        $user = 'root';
        $pass = '';
        $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
        die();
    }
    $sql = "UPDATE people SET active = :active WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $_SESSION['abc'], PDO::PARAM_STR);
    $stmt->bindValue(':active', $status, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: admin-modify.php");
    exit;
?>