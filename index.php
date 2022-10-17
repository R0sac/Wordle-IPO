<?php
    function getRandomLine($filename) { 
        $lines = file($filename); 
        return $lines[array_rand($lines)]; 
    }
    $randomWord = getRandomLine("catala_5.txt");
?>