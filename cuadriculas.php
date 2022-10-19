<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="cuadricula.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Wordle</title>
</head>
<body>
    <main id="contPrincipal">
        <div id="contDreta">
            <img src="wordleBanner.png" id="imgDreta">
        </div>
        <div id="contEsquerra">
            <img src="wordleBanner.png" id="imgEsquerra">
        </div>
        <div id="contCentre">
            <?php
                function getRandomLine($filename) { 
                    $lines = file($filename); 
                    return strtoupper(substr($lines[array_rand($lines)],0,-2));
                }
                $randomWord = getRandomLine("catala_5.txt");
            ?>
            <h1 id="titol">WORDLE</h1>
            <?php
                echo "<p id='nameuser'>".$_POST['inpUsuari']."</p>";
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
            
            <div id="contInstruccions">
            <table  class="tablaTeclado">
                    <tr>
                        <td><button onclick="addLetter('Q')" id="Q" class="boton_personalizado">Q</button></td>
                        <td><button onclick="addLetter('W')" id="W" class="boton_personalizado">W</button></td>
                        <td><button onclick="addLetter('E')" id="E" class="boton_personalizado">E</button></td>
                        <td><button onclick="addLetter('R')" id="R" class="boton_personalizado">R</button></td>
                        <td><button onclick="addLetter('T')" id="T" class="boton_personalizado">T</button></td>
                        <td><button onclick="addLetter('Y')" id="Y" class="boton_personalizado">Y</button></td>
                        <td><button onclick="addLetter('U')" id="U" class="boton_personalizado">U</button></td>
                        <td><button onclick="addLetter('I')" id="I" class="boton_personalizado">I</button></td>
                        <td><button onclick="addLetter('O')" id="O" class="boton_personalizado">O</button></td>
                        <td><button onclick="addLetter('P')" id="P" class="boton_personalizado">P</button></td>
                    </tr>
                    <tr>
                        <td><button onclick="addLetter('A')" id="A"class="boton_personalizado">A</button></td>
                        <td><button onclick="addLetter('S')" id="S"class="boton_personalizado">S</button></td>
                        <td><button onclick="addLetter('D')" id="D"class="boton_personalizado">D</button></td>
                        <td><button onclick="addLetter('F')" id="F"class="boton_personalizado">F</button></td>
                        <td><button onclick="addLetter('G')" id="G"class="boton_personalizado">G</button></td>
                        <td><button onclick="addLetter('H')" id="H"class="boton_personalizado">H</button></td>
                        <td><button onclick="addLetter('J')" id="J"class="boton_personalizado">J</button></td>
                        <td><button onclick="addLetter('K')" id="K"class="boton_personalizado">K</button></td>
                        <td><button onclick="addLetter('L')" id="L"class="boton_personalizado">L</button></td>
                        <td><button onclick="addLetter('Ç')" id="Ç"class="boton_personalizado">Ç</button></td>
                    </tr>
                    <tr>
                        <td><button onclick="jumpLine()" id="enviar" class="boton_personalizado">ENVIAR</button></td>
                        <td><button onclick="addLetter('Z')" id="Z" class="boton_personalizado">Z</button></td>
                        <td><button onclick="addLetter('X')" id="X" class="boton_personalizado">X</button></td>
                        <td><button onclick="addLetter('C')" id="C" class="boton_personalizado">C</button></td>
                        <td><button onclick="addLetter('V')" id="V" class="boton_personalizado">V</button></td>
                        <td><button onclick="addLetter('B')" id="B" class="boton_personalizado">B</button></td>
                        <td><button onclick="addLetter('N')" id="N" class="boton_personalizado">N</button></td>
                        <td><button onclick="addLetter('M')" id="M" class="boton_personalizado">M</button></td>
                        <td colspan="2"><button onclick="deleteLetter()" id="borrar" class="boton_personalizado">BORRAR</button></td>
                    </tr>
                </table>
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