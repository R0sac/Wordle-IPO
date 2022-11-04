<?php
    session_start();
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
    <body>
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
                <div>
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
                <form method="POST" id="formReset">
                    <input type="submit" value="Reset" name="reset">
                </form>
                <?php
                    function resetSession(){
                        unset($_SESSION['userName']);
                    }
                    if(isset($_POST['reset'])){
                        resetSession();
                    } 
                    echo "<p id='nameuserIndex'>".$_SESSION['userName']."</p>"; 
                    
                ?>
            </div>
        </div>
    </body>
</html>
