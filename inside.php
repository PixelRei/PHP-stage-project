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
        $sql = "SELECT username FROM utenti";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    ?>
    <div class="inside-container">
        <h1>Utenti che utilizzano il sito</h1>
        <textarea readonly>
            <?php
                $ID = 1;
                $space = "                 ";
                echo "ID".$space."USERNAME\n";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "\n             "."$ID".$space.$row['username'];
                    $ID++;
                }
            ?>
        </textarea>
    </div>
</body>
</html>