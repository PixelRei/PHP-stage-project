<?php
session_start();
if(!isset($_SESSION['username'])){
    header ("Location: index.php");
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
</head>
<body>
        <div class="panel">
            <div class="info">
                <p class="credentials">Username: <?=$username?></p>
                <p class="credentials">Password: <?=$password?></p>
                <form method="POST" enctype="multipart/form-data" class="image">
                    <label for="image">Carica immagine:</label>
                    <input type="file" name="image" required>
                    <input type="submit" name="submit-image" value="Upload" id="button">
                </form>
            </div>
            <div class="change">
                <form method="POST" autocomplete="off">
                <label for="username">Nuovo username:</label>
                <input type="text" name="username" required placeholder="New Username">
                <label for="password">Nuova password:</label>
                <input type="password" name="password" required placeholder="New Password">
                <a id="created" href="index.php"><input id="button" type="submit" name="submit" value="Modifica"></a>
                </form>
            </div>
            <div class="image-uploader">
                <?php   
                    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){ //condition to see if the form was sent correctly
                        
                    //update the session
                    $new_username = $_POST['username'];
                    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $_SESSION['username'] = $new_username;
                    $_SESSION['password'] = $_POST['password'];
                    //and also the database
                    try {   
                        $hostname = '127.0.0.1';
                        $dbname = 'mydatabse';
                        $user = 'root';
                        $pass = '';
                        $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                    } catch (PDOException $e) {
                        echo "error: ".$e->getMessage();
                        die();
                    }
                    $sql = "UPDATE people SET username = :username, password = :password WHERE id = :id";
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':username', $new_username, PDO::PARAM_STR);
                    $stmt->bindValue(':password', $new_password, PDO::PARAM_STR);
                    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
                    $stmt->execute();
                    header("Location: index.php");
                    //exit;
                    }
                ?>
                <!---script for image management--->
                <?php
                $uploadOk = 0;
                $targetFile = "";

                if (isset($_POST['submit-image'])) {
                    if (isset($_FILES["image"])) {
                        $directory = 'uploads/';
                        $targetFile = $directory . basename($_FILES["image"]["name"]);
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                        // Controlla se è un'immagine
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($check !== false) {
                            //echo "Il file è un'immagine - " . $check["mime"] . ".<br>";
                            $uploadOk = 1;
                        } else {
                            echo "Il file non è un'immagine.<br>";
                            $uploadOk = 0;
                        }

                        /* Controlla se il file esiste già
                        if (file_exists($targetFile)) {
                            echo "Il file esiste già.<br>";
                            $uploadOk = 0;
                        }*/

                        // Controlla la dimensione del file
                        if ($_FILES["image"]["size"] > 500000) {
                            echo "Il file è troppo grande.<br>";
                            $uploadOk = 0;
                        }

                        /* Controlla il formato del file
                        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                            echo "Solamente i file JPG, JPEG, PNG & GIF sono accettati.<br>";
                            $uploadOk = 0;
                        }*/

                        // Prova a caricare il file
                        if ($uploadOk == 0) {
                            echo "Il file non è stato caricato correttamente.<br>";
                        } else {
                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                                echo "Il file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " è stato caricato con successo.<br>";
                            } else {
                                echo "C'è stato un errore durante il caricamento.<br>";
                            }
                        }
                    }
                }
                try {
                        $hostname = '127.0.0.1';
                        $dbname = 'mydatabse';
                        $user = 'root';
                        $pass = '';
                        $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
                    } catch (PDOException $e) {
                        echo "error: ".$e->getMessage();
                        die();
                    }
                $sql = "UPDATE people SET image = :targetFile WHERE id = :id";
                $stmt= $db->prepare($sql);
                $stmt->bindValue(':targetFile', $targetFile, PDO::PARAM_STR);
                $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
                $stmt->execute();
                ?>
                <?php if (isset($_FILES["image"]) && $uploadOk == 1) : ?>
                    <img src="<?php echo $targetFile; ?>"width="80%" alt="Uploaded Image">
                <?php endif; ?>
            </div>
        </div>
</body>
</html>