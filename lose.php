<?php session_start(); 
include "configuracion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="juego.js"></script>
    <title>Derrota Wordle</title>
</head>
<body onload="soundYouLose()">
    <div id="contPrincipal">
        <div id="contDreta">
            <img src="wordleBanner.png" id="imgDreta">
        </div>
        <div id="contEsquerra">
            <img src="wordleBanner.png" id="imgEsquerra">
        </div>
        <div id="contCentre">
            <div id="contHeader">
                <button onclick="document.location.href='./index.php';"><?php echo $lang['home']?></button>
                <button onclick="document.location.href='./game.php';"><?php echo $lang['bottonPlay']?></button>
            </div>
            <h1 id="titol">WORDLE</h1>
            <?php
                echo "<p id='nameuser'>".$_SESSION['userName']."</p>";
            ?>
            <img src="wordleDerrota.gif" id="imgCentre">
            <h1 id="textFinalPartida"><?php echo $lang['perder']?></h1>
        </div>
    </div>
</body>
</html>