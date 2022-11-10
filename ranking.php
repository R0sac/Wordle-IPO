<?php
    session_start();
    include "configuracion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="shortcut icon" href="https://www.nytimes.com/games-assets/v2/metadata/wordle-favicon.ico?v=v2210261020%22/%3E">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./juego.js"></script>
    <title>Wordle</title>
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
            <button id="darkmode" onclick="toggleTheme()"></button>
            <div id="contHeader">
                <button onclick="document.location.href='./index.php';"><?php echo $lang['home']?></button>
                <button onclick="document.location.href='./game.php';"><?php echo $lang['bottonPlay']?></button>
            </div>
            <h1 id="titol">HALL OF FAME</h1>
            <div id="divHallofFame">
                <table class="tableHallOfFame">
                    <tr>
                        <th>Nom</th>
                        <th>Punts</th>
                        <th>Intents</th>
                        <th>Victories</th>
                        <th>Derrotes</th>
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <?php
                        $gamesExploded = explode(";",$_SESSION['arrayGames']);
                        $gameExploded = [];
                        $allExploded = [];
                        for ($i=0; $i<count($gamesExploded); $i++) {
                            $gameExploded = explode(",",$gamesExploded[$i]);
                            $gameExploded = array_slice($gameExploded,0,5);
                            array_push($allExploded,$gameExploded);
                        }
                        for ($i=0; $i<count($allExploded); $i++) {
                            echo "<tr>";
                            for($j=0;$j<count($allExploded[$i]);$j++){
                                echo "<td>".$allExploded[$i][$j]."</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>