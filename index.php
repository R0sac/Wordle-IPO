<?php session_start(); 
include "configuracion.php"
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="juego.js"></script>
        <title>Benvingut a Wordle</title>
    </head>
    <body>
        <div id="contPrincipal">
            <div id="contDreta">
                <img src="wordleBanner.png" id="imgDreta">
            </div>
            <div id="contEsquerra">
                <img src="wordleBanner.png" id="imgEsquerra">
            </div>
            <div id="contCentre">
                <p id="benvingut"><?php echo $lang['wellcome']?></p>
                <h1 id="titolIndex">WORDLE</h1>
                <div class="footer bg-dark">
                    <a href="index.php?lang=ca"> <?php echo $lang['ca'] ?> </a> | <a href="index.php?lang=en"> <?php echo $lang['en'] ?></a> | <a href="index.php?lang=es"> <?php echo $lang['es'] ?> </a>
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
                <form method="POST" action="game.php">
                    <input type="text" id="inpUsuari" name="inpUsuari" onkeyup="bloquejarBoton()" placeholder="<?php echo $lang['placeholder']?>" ><br>
                    <input type="submit" disabled id="botoUsuari" value="<?php echo $lang['bottonPlay']?>">
                </form>
            </div>
        </div>
    </body>
</html>