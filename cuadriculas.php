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
            <h1 id="titol">WORDLE</h1>
            <img src="wordleBanner.png" id="imgDreta">
            <img src="wordleBanner.png" id="imgEsquerra">
            <?php
                $fila = 6;
                $columna = 5;
                echo "<table class='tablaLetras'>";
                for ($i=1; $i <= $fila; $i++) {
                    echo "<tr>";
                    for ($j=1; $j <= $columna; $j++) { 
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            ?>
            
            <div id="contInstruccions">
                <table  class="tablaTeclado">
                    <tr>
                        <td>Q</td>
                        <td>W</td>
                        <td>E</td>
                        <td>R</td>
                        <td>T</td>
                        <td>Y</td>
                        <td>U</td>
                        <td>I</td>
                        <td>O</td>
                        <td>P</td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>S</td>
                        <td>D</td>
                        <td>F</td>
                        <td>G</td>
                        <td>H</td>
                        <td>J</td>
                        <td>K</td>
                        <td>L</td>
                        <td>Ç</td>
                    </tr>
                    <tr>
                        <td>BORRAR</td>
                        <td>Z</td>
                        <td>X</td>
                        <td>C</td>
                        <td>V</td>
                        <td>B</td>
                        <td>N</td>
                        <td>M</td>
                        <td colspan="2">ENVIAR</td>
                    </tr>
                </table>
            </div>
    </main>
</body>
</html>