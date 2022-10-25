<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victoria Wordle</title>
</head>
<body>
    <div id="contPrincipal">
        <div id="contDreta">
            <img src="wordleBanner.png" id="imgDretaFinal">
        </div>
        <div id="contEsquerra">
            <img src="wordleBanner.png" id="imgEsquerraFinal">
        </div>
        <div id="contCentre">
            <div id="contHeader">
                <button onclick="document.location.href='./index.php';">HOME</button>
                <button onclick="document.location.href='./game.php';">JUGAR</button>
            </div>
            <h1 id="titol">WORDLE</h1>
            <?php
                echo "<p id='nameuser'>".$_SESSION['userName']."</p>";
                echo "<p id='pointUser'>PUNTS: 0</p>";
            ?>
            <div class="bordeFinalParitda">
                <h1 id="textFinalPartida">HAS GUANYAT!</h1>
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
                    <button onclick="addLetter('Ç')" id="Ç"class="boton_personalizado">Ç</button>
                </div>
                <div id="teclatFila3">
                    <button onclick="jumpLine()" id="enviar" class="boton_personalizado_accio">ENVIAR</button>
                    <button onclick="addLetter('Z')" id="Z" class="boton_personalizado">Z</button>
                    <button onclick="addLetter('X')" id="X" class="boton_personalizado">X</button>
                    <button onclick="addLetter('C')" id="C" class="boton_personalizado">C</button>
                    <button onclick="addLetter('V')" id="V" class="boton_personalizado">V</button>
                    <button onclick="addLetter('B')" id="B" class="boton_personalizado">B</button>
                    <button onclick="addLetter('N')" id="N" class="boton_personalizado">N</button>
                    <button onclick="addLetter('M')" id="M" class="boton_personalizado">M</button>
                    <button onclick="deleteLetter()" id="borrar" class="boton_personalizado_accio">BORRAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>