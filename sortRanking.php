<?php
    session_start();
    $_SESSION['arrayGames'] = $_POST['arrayGames'];
    $fh = fopen('records.txt','r');
    $arrayGames = [];
    while ($line = fgets($fh)) {
        $lineReaden = explode(",",$line);
        array_push($arrayGames,array_slice($lineReaden,0,5));
    }
    fclose($fh);
    $points = array_column($arrayGames,1);
    array_multisort($points,SORT_DESC,$arrayGames);
    for ($i=0; $i<count($arrayGames); $i++) {
        for($j=0;$j<count($arrayGames[$i]);$j++){
            $_SESSION['arrayGames'] = $_SESSION['arrayGames'].$arrayGames[$i][$j].",";
        }
        $_SESSION['arrayGames'] = $_SESSION['arrayGames'].";";
    }
    echo "<script> document.location.href='./ranking.php'; </script>";
    exit(); 
?>