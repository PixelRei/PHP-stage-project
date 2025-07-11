<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
    exit;
}
//url of Github's API which contains the most popular repositories
$url = "https://api.github.com/search/repositories?q=stars:%3E10000&sort=stars&per_page=100";
$i = 1;
// initialize cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //in this way we're telling github that we are an app and to not refuse our request
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: MyPHPApp'
]);

$response = curl_exec($ch);//executes the request and gets the JSON file
curl_close($ch);

$data = json_decode($response, true);//converts in an associative array

$langCount = [];

//counts the languages
foreach ($data['items'] as $repo) {
    $lang = $repo['language'];
    if ($lang) {
        if (!isset($langCount[$lang])) {
            $langCount[$lang] = 0;
        }
        $langCount[$lang]++;
    }
}

//sort by frequency
arsort($langCount);

//takes the first 10
$top10 = array_slice($langCount, 0, 10, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Linguaggi più usati</title>
    <link rel="icon" href="img/moon-icon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br><br><br><br><br><br>    
    <div class="error">
        <h1 style="font-family: arial;">Top 10 linguaggi <?=date("Y");?></h1>
        <table>
            <tr>
                <th>N°</th>
                <th>Linguaggio</th>
                <th>repository</th>
            </tr>
                <?php foreach ($top10 as $lang => $count): ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><strong><?= htmlspecialchars($lang) ?></strong></td>
                        <td><?= $count ?></td>
                    </tr><?php $i++;?>
                <?php endforeach; ?>
        </table>
        <a id="created" href="user-panel.php"><button id="button">Indietro</button></a>

    </div>
    <br>
    <div class="alternative">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px;">Logout</a></p>
    </div>
</body>
</html>
