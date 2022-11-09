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
                
                <?php 
                    $_SESSION["loseGameChronoByTime"] = false;
                    if(isset($_POST["gameMode"])){//ELIGE EL MODO DE JUEGO SEGUN QUE HEMOS ELEGIDO
                        if($_POST["gameMode"] == $lang['bottonPlay']){//Verifica el modo de juego que hemos seleccionado
                            $gameModeWordle= 0;//EL 0 es el modo normal
                            $_SESSION["gameModeWordle"]= 0;
                        }
                        
                        if($_POST["gameMode"] == $lang['bottonPlayCrono']){//Verifica el modo de juego que hemos seleccionado
                            $gameModeWordle= 1;//EL 1 es el modo crono
                            $_SESSION["gameModeWordle"]= 1;
                        }
                    }
                    else if(isset($_SESSION["gameModeWordle"])){
                        if($_SESSION["gameModeWordle"] == 0){//Verifica el modo de juego que hemos seleccionado
                            $gameModeWordle= 0;//EL 0 es el modo normal
                        }
                        
                        
                        if($_SESSION["gameModeWordle"] == 1){//Verifica el modo de juego que hemos seleccionado
                            $gameModeWordle= 1;//EL 1 es el modo crono
                        }
                    }

                    
                ?>

                <form method="POST" action="game.php">
                    <input type="text" id="inpUsuari" name="inpUsuari" onkeyup="bloquejarBoton()" placeholder="<?php echo $lang['placeholder']?>" ><br>
                    <input type="submit" disabled id="botoUsuari" name="gameMode" value="<?php echo $lang['bottonPlay']?>"/><br>
                    <input type="submit" disabled id="botoUsuari1" name="gameMode" value="<?php echo $lang['bottonPlayCrono']?>"/>
                </form>
            </div>
        </div>
    </body>
</html>
