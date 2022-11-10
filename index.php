<?php
    session_start();
    $_SESSION['booleanError'] = true;
    include "configuracion.php"
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="shortcut icon" href="https://www.nytimes.com/games-assets/v2/metadata/wordle-favicon.ico?v=v2210261020%22/%3E">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="juego.js"></script>
        <title>Wordle</title>
    </head>
    <body onload="bloquejarBoton()">
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
                <img src="wordleBanner.png" id="imgDretaBenv">
            </div>
            <div id="contEsquerra">
                <img src="wordleBanner.png" id="imgEsquerraBenv">
            </div>
            <div id="contCentre">
                <button id="darkmode" onclick="toggleTheme()"></button>
                <p id="benvingut"><?php echo $lang['wellcome']?></p>
                <h1 id="titolIndex">WORDLE</h1>
                <div id="contIdioma">
                    <button id="botonIdioma"><a href="index.php?lang=ca"> <?php echo $lang['ca'] ?> </a></button> | <button id="botonIdioma"><a href="index.php?lang=en"> <?php echo $lang['en'] ?> </a></button> | <button id="botonIdioma"><a href="index.php?lang=es"> <?php echo $lang['es'] ?> </a></button> 
                </div>
                <div id="contInstruccions">
                    <h3><?php echo $lang['h3']?></h3>
                    <p><?php echo $lang['p']?></p>
                    <ul style="list-style:none;">
                        <li><?php echo $lang['li_1']?></li>
                        <li><?php echo $lang['li_2']?></li>
                        <li><?php echo $lang['li_3']?></li>
                    </ul>
                </div>
                <h4><?php echo $lang['h4']?></h4>
                
                <form method="POST" action="game.php" id="formUsuari">
                    <input type="text" id="inpUsuari" name="inpUsuari" onkeyup="bloquejarBoton()" placeholder="<?php echo $lang['placeholder']?>" value="<?php if(isset($_SESSION['userName'])){echo $_SESSION['userName'];}?>"><br>
                    <input type="submit" disabled id="botoUsuari" value="<?php echo $lang['bottonPlay']?>"/>
                </form>
                <form method="POST" action="sortRanking.php">
                    <input type="hidden" id="arrayGames" name="arrayGames" value="">
                    <input type="submit" id="botoRanking" value="Hall of Fame"/>
                </form>

                <button id="resetID" onclick="showReset()"><?php echo $lang['reset']?></button>
                <div id="contReset" class="contReset">
                    <form class="contResetContent" action="/action_page.php">
                        <div class="container">
                        <h1><?php echo $lang['resetTitle']?></h1>
                        <p><?php echo $lang['resetP']?></p>
                        
                        <div>
                            <button type="button" onclick="document.getElementById('contReset').style.display='none'" class="cancelButton"><?php echo $lang['resetCancel']?></button>
                            <button type="button" onclick="document.location.href='./sessionDestroy.php'" class="resetButton"><?php echo $lang['resetConfirmation']?></button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
