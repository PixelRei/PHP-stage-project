<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/moon-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="error">
        <h1 style="color:white;">Benvenuto nel pannello amministratore</h1>
        <br>
        <h3 style="text-align: center; color: white; font-family: Surprise; font-size: 35px;">Quello che puoi fare:</h3>
        <br>
        <div class="others">
            <div>
                <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Tabella</div>
                    <div class="card-body">
                        <h5 class="card-title">Vedi tabella utenti</h5>
                        <p class="card-text">Dai un'occhiata alla tabella contenente tutti gli utenti e le immagini che hanno caricato.</p>
                    </div>
                    <a href="inside.php" class="btn btn-primary" style="background-color: ; text-decoration: none;">Vai!</a>
                </div>
            </div>
            <div>
                <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Utenti</div>
                    <div class="card-body">
                        <h5 class="card-title">Modifica utenti</h5>
                        <p class="card-text">Modifica credenziali, disattiva/attiva account o rendi amministratore un account a tua scelta.</p>
                    </div>
                    <a href="admin.php" class="btn btn-primary" style="background-color: ; text-decoration: none;">Vai!</a>
                </div>
            </div>
            <div>
                <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Questionari</div>
                    <div class="card-body">
                        <h5 class="card-title">Vedi tabella questionari</h5>
                        <p class="card-text">Dai un'occhiata alle risposte degli utenti ai questionari da loro compilati.</p>
                    </div>
                    <a href="view_questionari.php" class="btn btn-primary" style="background-color: ; text-decoration: none;">Vai!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="padding-top: 10px;">
        <p style="color: white;">© 2025<a href="https://github.com/PixelRei" target="blank" style="font-size:18px; text-decoration: none;">PixelRei</a>   -   <a href="logout.php" style="font-size: 18px; text-decoration: none;">Logout</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>