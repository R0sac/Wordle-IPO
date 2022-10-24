<?php session_start(); 
include '/lang/ca.php';
include '/lang/en.php';
include '/lang/es.php';
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
                <p id="benvingut"></p>
                <h1 id="titolIndex">WORDLE</h1>
                <form>
                    <label for="lang"></label>
                    <select name="idioma" id="idioma">
                        <option value="ca" selected>Català</option>
                        <option value="en">English</option>
                        <option value="es">Castellano</option>
                    </select>
                </form>
                <div id="contInstruccions">
                    <h3></h3>
                    <p></p>
                    <ul style="list-style:none;">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <h4></h4>
                
                <form method="POST" action="game.php">
                    <input type="text" id="inpUsuari" name="inpUsuari" onkeyup="bloquejarBoton()" placeholder="Nom d'usuari" ><br>
                    <input type="submit" disabled id="botoUsuari" value="JUGAR"/>
                </form>
            </div>
        </div>
    </body>
</html>