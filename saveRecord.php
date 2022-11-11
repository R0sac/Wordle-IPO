<?php
    session_start();  
    $fp = fopen('records.txt', 'a');
    for($i=0; $i<count(end($_SESSION["arrayPlayer"])); $i++){
        fwrite($fp, end($_SESSION["arrayPlayer"])[$i].",");
    }
    fwrite($fp, "\n");
    fclose($fp);
    echo "<script> document.location.href='./index.php'; </script>";
    exit(); 
?>