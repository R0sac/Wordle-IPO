<?php
    session_start();
    $_SESSION['booleanError'] = false;
    echo "<script> document.location.href='./win.php'; </script>";
?>