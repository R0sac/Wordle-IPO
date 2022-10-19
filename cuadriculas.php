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
                    return $lines[array_rand($lines)];
                }
                $randomWord = getRandomLine("catala_5.txt");
                echo $randomWord;
            ?>
            <h1 id="titol">WORDLE</h1>
            <?php
                echo "<p>".$_POST['inpUsuari']."</p>";
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
                        <td><button onclick="addLetter('Q')" id="Q">Q</button></td>
                        <td><button onclick="addLetter('W')" id="W">W</button></td>
                        <td><button onclick="addLetter('E')" id="E">E</button></td>
                        <td><button onclick="addLetter('R')" id="R">R</button></td>
                        <td><button onclick="addLetter('T')" id="T">T</button></td>
                        <td><button onclick="addLetter('Y')" id="Y">Y</button></td>
                        <td><button onclick="addLetter('U')" id="U">U</button></td>
                        <td><button onclick="addLetter('I')" id="I">I</button></td>
                        <td><button onclick="addLetter('O')" id="O">O</button></td>
                        <td><button onclick="addLetter('P')" id="P">P</button></td>
                    </tr>
                    <tr>
                        <td><button onclick="addLetter('A')" id="A">A</button></td>
                        <td><button onclick="addLetter('S')" id="S">S</button></td>
                        <td><button onclick="addLetter('D')" id="D">D</button></td>
                        <td><button onclick="addLetter('F')" id="F">F</button></td>
                        <td><button onclick="addLetter('G')" id="G">G</button></td>
                        <td><button onclick="addLetter('H')" id="H">H</button></td>
                        <td><button onclick="addLetter('J')" id="J">J</button></td>
                        <td><button onclick="addLetter('K')" id="K">K</button></td>
                        <td><button onclick="addLetter('L')" id="L">L</button></td>
                        <td><button onclick="addLetter('Ç')" id="Ç">Ç</button></td>
                    </tr>
                    <tr>
                        <td><button onclick="jumpLine()" id="enviar">ENVIAR</button></td>
                        <td><button onclick="addLetter('Z')" id="Z">Z</button></td>
                        <td><button onclick="addLetter('X')" id="X">X</button></td>
                        <td><button onclick="addLetter('C')" id="C">C</button></td>
                        <td><button onclick="addLetter('V')" id="V">V</button></td>
                        <td><button onclick="addLetter('B')" id="B">B</button></td>
                        <td><button onclick="addLetter('N')" id="N">N</button></td>
                        <td><button onclick="addLetter('M')" id="M">M</button></td>
                        <td colspan="2"><button onclick="deleteLetter()" id="borrar">BORRAR</button></td>
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