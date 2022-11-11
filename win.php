<?php
    session_start();
    if($_SESSION['booleanError']){
        http_response_code(403);
        echo "<div id='contForbidden'><h1>Error 403 - Forbidden</h1></div>";
    }
    include "configuracion.php";
    if(isset($_SESSION["arrayPlayer"])){
        $_SESSION["arrayPlayer"];
    }
    else{
        $_SESSION["arrayPlayer"] = array();
    }

    $arrayPlayer = [$_SESSION['userName'],$_SESSION['puntuacio'],$_SESSION['intents'],$_SESSION['victories'],$_SESSION['derrotes']];
    array_push($_SESSION["arrayPlayer"], $arrayPlayer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="https://www.nytimes.com/games-assets/v2/metadata/wordle-favicon.ico?v=v2210261020%22/%3E">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./juego.js"></script>
    <title>Wordle</title>
</head>
<body onload="soundYouWin()">
    <noscript>
            <div class=".noscript">
                <h1>Javascript NO ESTÀ ACTIVAT</h1>
                <div class="deshabilitado">
                    Javascript està deshabilitat al vostre navegador web.<br />
                    Por favor, para ver correctamente este sitio,<br />
                    <b><i>habiliti javascript</i></b>.<br />
                    <br />
                    Per veure les instruccions per habilitar javascript<br />
                    al vostre navegador, feu click 
                    <a href="https://support.google.com/adsense/answer/12654?hl=ca" 
                    target="_blank">aquí</a>.
                </div>
            </div>
    </noscript>
    <div id="contPrincipal">
        <div id="contDreta">
            <img src="wordleBanner.png" id="imgDretaFinal">
        </div>
        <div id="contEsquerra">
            <img src="wordleBanner.png" id="imgEsquerraFinal">
        </div>
        <div id="contCentre">
            <button id="darkmode" onclick="toggleTheme()"></button>
            <div id="contHeader">
                <button onclick="document.location.href='./index.php';"><?php echo $lang['home']?></button>
                <button onclick="document.location.href='./game.php';"><?php echo $lang['bottonPlay']?></button>
            </div>
            <h1 id="titol">WORDLE</h1>
            <?php
                echo "<p id='nameuser'>".$_SESSION['userName']."</p>";
                echo "<p id='pointUser'>".$lang['puntos'].$arrayPlayer[1]."</p>";
                echo "<p id='exUser'>".$lang['exitoses'].$arrayPlayer[3]."</p>";
                echo "<p id='fallUser'>".$lang['errors'].$arrayPlayer[4]."</p>";
                echo "<p id='triesUser'>".$lang['intents'].$arrayPlayer[2]."</p>";
            ?>
            <div class="bordeFinalParitda">
                <h1 id="textFinalPartida"><?php echo $lang['ganar']?></h1>
            </div>
            <div id="publicar">
                <h1 id="textPublicar"><?php echo $lang['publicar']?></h1>
                <div id="respPublicar">
                    <button id="bRespPublS" onclick="document.location.href='./saveRecord.php';"><?php echo $lang['yes']?></button>
                    <button id="bRespPublN" onclick="document.location.href='./index.php';"><?php echo "NO"?></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>