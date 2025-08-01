    <?php
    session_start();
    if(!isset($_SESSION['username'])){
        header ("Location: index.php");
    }
    if($_SESSION['admin'] == 0){
        header("location: alert.php");
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - View Users</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/moon-icon.png">
    </head>
    <body>
        <br><br><br><br><br><br>
        <?php
            //connection to database
            try {
                $hostname = '127.0.0.1';
                $dbname = 'mydatabse';
                $user = 'root';
                $pass = '';
                $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql = "SELECT username, id, image FROM people";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        ?>
        <div class="inside-container">
            <h1>Utenti che utilizzano il sito</h1>
            <table style="width:70%">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>IMAGE</th>
                    <th>EDIT</th>
                </tr>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <?php if($row['username'] != 'admin'): ?>
                            <tr>
                                <td> <?= $row['id'] ?></td>
                                <td><?=$row['username'] ?></td>
                                <td><img src="uploads/<?=$row['image'] ?>" width="10%"></td>
                                <td><a href="admin-modify.php?user=<?=urlencode($row['username'])?>" style="text-decoration: none;">✏️</a></td>
                            </tr>
                        <?php endif; ?>
                <?php endwhile; ?>
            </table>
            <a id="created" href="admin-panel.php"><button id="button">Indietro</button></a>
        </div>
        <br>
        <div class="alternative">
            <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px;">Logout</a></p>
        </div>
    </body>
    </html>