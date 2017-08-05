<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username || !isset($_GET['action'])){
        Header("Location: ./");
        die();
    }

    if($_GET['action'] == "shutdown"){
        shell_exec("shutdown now");
    }

    if($_GET['action'] == "reboot"){
        shell_exec("reboot now");
    }

?>