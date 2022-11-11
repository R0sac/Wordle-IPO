<?php
    session_start();
    $_SESSION['booleanError'] = true;
    include "configuracion.php"
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="https://www.nytimes.com/games-assets/v2/metadata/wordle-favicon.ico?v=v2210261020%22/%3E">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Wordle</title>
</head>
<body onload="inicioCronometro()">
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
    <main id="contPrincipal">
        <div id="contDreta">
            <img src="wordleBanner.png" id="imgDretaJugar">
        </div>
        <div id="contEsquerra">
            <img src="wordleBanner.png" id="imgEsquerraJugar">
        </div>
        <div id="contCentre">
            <button id="darkmode" onclick="toggleTheme()"></button>
            <?php
                $fh = fopen('records.txt','r');
                $arrayGames = [];
                while ($line = fgets($fh)) {
                    $lineReaden = explode(",",$line);
                    array_push($arrayGames,array_slice($lineReaden,0,5));
                }
                fclose($fh);
                $points = array_column($arrayGames,1);
                array_multisort($points,SORT_DESC,$arrayGames);
                echo "<p id='top1'>"."TOP 1: "."<br>".$arrayGames[0][0]."</p>";
            ?>
            <div id="contHeader">
                <button onclick="document.location.href='./index.php';"><?php echo $lang['home']?></button>
                <button onclick="document.location.href='./game.php';"><?php echo $lang['bottonPlay']?></button>
            </div>
            <?php
                function getRandomLine($filename) { 
                    $lines = file($filename); 
                    return strtoupper(substr($lines[array_rand($lines)],0,-1)); //ARREGLAR -1 O -2
                }
                    $randomWord = getRandomLine($lang['file']);
            ?>
            <h1 id="titol">WORDLE</h1>
            <?php
                //$points = $_GET['points'];
                if(isset($_POST['inpUsuari']) == false){
                    $_SESSION['userName'] = $_SESSION['userName'];
                }
                else{
                    $_SESSION['userName'] = $_POST['inpUsuari'];
                }
                echo "<p id='nameuser'>".$_SESSION['userName']."</p>";
                echo "<p id='pointUser'>".$lang['puntos']."</p>";
                $fila = 6;
                $columna = 5;
                echo "<table class='tablaLetras'>";
                for ($i=1; $i <= $fila; $i++) {
                    echo "<tr>";
                    for ($j=1; $j <= $columna; $j++) { 
                        echo "<td id=$i$j></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            ?>

            <div id='grootVideo'>
                <video width="560" height="250" autoplay muted>
                    <source src="groot.mp4" type="video/mp4">
                </video>
            </div>
            <!--<p><?php //echo $randomWord ?></p>-->
            <div id="contTimer">
                <p id="time"></p>
            </div>
            <div id="contTeclat">
                <div id="teclatFila1">
                    <button onclick="addLetter('Q')" id="Q" class="boton_personalizado">Q</button>
                    <button onclick="addLetter('W')" id="W" class="boton_personalizado">W</button>
                    <button onclick="addLetter('E')" id="E" class="boton_personalizado">E</button>
                    <button onclick="addLetter('R')" id="R" class="boton_personalizado">R</button>
                    <button onclick="addLetter('T')" id="T" class="boton_personalizado">T</button>
                    <button onclick="addLetter('Y')" id="Y" class="boton_personalizado">Y</button>
                    <button onclick="addLetter('U')" id="U" class="boton_personalizado">U</button>
                    <button onclick="addLetter('I')" id="I" class="boton_personalizado">I</button>
                    <button onclick="addLetter('O')" id="O" class="boton_personalizado">O</button>
                    <button onclick="addLetter('P')" id="P" class="boton_personalizado">P</button>
                </div>
                <div id="teclatFila2">
                    <button onclick="addLetter('A')" id="A"class="boton_personalizado">A</button>
                    <button onclick="addLetter('S')" id="S"class="boton_personalizado">S</button>
                    <button onclick="addLetter('D')" id="D"class="boton_personalizado">D</button>
                    <button onclick="addLetter('F')" id="F"class="boton_personalizado">F</button>
                    <button onclick="addLetter('G')" id="G"class="boton_personalizado">G</button>
                    <button onclick="addLetter('H')" id="H"class="boton_personalizado">H</button>
                    <button onclick="addLetter('J')" id="J"class="boton_personalizado">J</button>
                    <button onclick="addLetter('K')" id="K"class="boton_personalizado">K</button>
                    <button onclick="addLetter('L')" id="L"class="boton_personalizado">L</button>
                    <button onclick="addLetter('<?php echo $lang['letra']?>')" id="<?php echo $lang['letra']?>"class="boton_personalizado"><?php echo $lang['letra']?></button>
                </div>
                <div id="teclatFila3">
                    <form id="form" name="enviarForm" onsubmit="return true" method="post" action="">
                        <input type="hidden" id="puntuacio" name="puntuacio" value=0>
                        <input type="hidden" id="intents" name="intents" value=0>
                        <input type="hidden" id="victories" name="victories" value=0>
                        <input type="hidden" id="derrotes" name="derrotes" value=0>
                        <input type="submit" onclick="jumpLine()" id="enviar" class="boton_personalizado_accio1" value="<?php echo $lang['enviar']?>">
                    </form>
                    <button onclick="addLetter('Z')" id="Z" class="boton_personalizado">Z</button>
                    <button onclick="addLetter('X')" id="X" class="boton_personalizado">X</button>
                    <button onclick="addLetter('C')" id="C" class="boton_personalizado">C</button>
                    <button onclick="addLetter('V')" id="V" class="boton_personalizado">V</button>
                    <button onclick="addLetter('B')" id="B" class="boton_personalizado">B</button>
                    <button onclick="addLetter('N')" id="N" class="boton_personalizado">N</button>
                    <button onclick="addLetter('M')" id="M" class="boton_personalizado">M</button>
                    <button onclick="deleteLetter()" id="borrar" class="boton_personalizado_accio"><?php echo $lang['borrar']?></button>
                </div>
            </div>
        </div>
    </main>
    <script>
        <?php
            echo "var php_var = '$randomWord';";
        ?>
    </script>
    <script src="./juego.js"></script>
</body>
</html>