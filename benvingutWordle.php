<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="estilsWordle.css" type="text/css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Benvingut a Wordle</title>
    </head>
    <body>
        <div id="contPrincipal">
            <p>Benvingut a</p>
            <h1 id="titol">WORDLE</h1>
            <img src="wordleBanner.png" id="imgDreta">
            <img src="wordleBanner.png" id="imgEsquerra">
            
            <div id="contInstruccions">
                <h3>Instruccions</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently 
                    with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            </div>
            <h4>Introdueix un nom d'usuari:</h4>    
            <form method="POST" action="cuadriculas.php">
                <input type="text" id="inpUsuari" placeholder="Nom d'usuari"><br>
                <input type="submit" id="botoUsuari" value="JUGAR"/>    
            </form>
        </div>
    </body>
</html>