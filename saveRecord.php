<?php
    session_start();  
    $fp = fopen('records.txt', 'a');//opens file in append mode
    for($i=0; $i<count(end($_SESSION["arrayPlayer"])); $i++){
        fwrite($fp, end($_SESSION["arrayPlayer"])[$i].",");
    }
    fwrite($fp, "\n");
    fclose($fp);
    // echo "File appended successfully";
    // ini_set("echo"."<script> document.location.href='./index.php'; </script>", 2);
    // setTimeout(function(){document.location.href="./lose.php";},500)
    echo "<script> document.location.href='./index.php'; </script>";
    exit(); 
?>