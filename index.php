<?php
    session_start();
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
                <p id="benvingut">Benvingut a</p>
                <h1 id="titolIndex">WORDLE</h1>
                <div id="contInstruccions">
                    <h3>INSTRUCCIONS</h3>
                    <p>Qualsevol persona pot jugar a la paraula del dia.<br>
                    L' objectiu és simple, endevinar la paraula oculta. La paraula té 5 lletres i tens 6 intents per endevinar-la. La paraula és la mateixa per a totes les persones en aquell dia.<br>
                    Cada intent ha de ser una paraula vàlida. A cada ronda el joc pinta cada lletra d'un color indicant si aquesta lletra es troba o no a la paraula i si es troba a la posició correcta.</p>
                    <ul style="list-style:none;">
                        <li><font color="green"><b>VERD</b></font> significa que la lletra R està en la paraula i en la posició <font color="green"><b>CORRECTA</b></font>.</li>
                        <li><font color="yellow"><b>GROC</b></font> significa que la lletra està present en la paraula però en la posició <font color="yellow"><b>INCORRECTA</b></font>.</li>
                        <li><font color="grey"><b>GRIS</b></font> significa que la lletra <font color="grey"><b>NO</b></font> està en la paraula.</li>
                    </ul>
                </div>
                <h4>Introdueix un nom d'usuari:</h4>
                
                <form method="POST" action="game.php">
                    <input type="text" id="inpUsuari" name="inpUsuari" onkeyup="bloquejarBoton()" placeholder="Nom d'usuari" ><br>
                    <input type="submit" disabled id="botoUsuari" value="JUGAR"/>
                </form>
            </div>
        </div>
    </body>
</html>
