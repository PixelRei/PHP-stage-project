<?php
if(!isset($_SESSION['username'])){
    header ("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>
    <?php
        $num_utenti = "tredici";
        //collegamento al database
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
        $sql = "SELECT username, id FROM people";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    ?>
    <div class="inside-container">
        <h1>Utenti che utilizzano il sito</h1>
        <table style="width:70%">
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
            </tr>
            <?php
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <div class="buttons">
            <a href="logout.php" id="created"><button id="button">Logout</button></a>
            <a href="modify.php" id="created"><button id="button">Modifica utente</button></a>
        </div>
    </div>
</body>
</html>