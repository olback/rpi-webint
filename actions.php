<?php

    require __DIR__ . '/config.php';
    session_start();

    if($_SESSION['username'] !== $username || !isset($_GET['action'])){
        Header("Location: ./");
        die();
    }

    if($_GET['action'] == "shutdown"){
        shell_exec("sudo shutdown now");
    }

    if($_GET['action'] == "reboot"){
        shell_exec("sudo reboot now");
    }

    if($_GET['action'] == "main"){
        $_SESSION['page'] = "main";
        Header("Location: ./");
        die();
    }

    if($_GET['action'] == "gpio"){
        $_SESSION['page'] = "gpio";
        Header("Location: ./");
        die();
    }

    if($_GET['action'] == "about"){
        $_SESSION['page'] = "about";
        Header("Location: ./");
        die();
    }

    if($_GET['action'] == "logoff"){
        session_start();
        $_SESSION['username'] = NULL;
        session_destroy();
        Header("Location: ./");
        die();
    }
?>