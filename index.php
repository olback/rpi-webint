<?php

// Load config.
require __DIR__ . '/config.php';
session_start();

if($_SESSION['username'] != $username){

    require __DIR__ . '/login.php';

} elseif($_SESSION['page'] == "gpio") {

    require __DIR__ . '/gpio.php';

} elseif($_SESSION['page'] == "about") {

    require __DIR__ . '/about.php';

} else {

    require __DIR__ . '/main.php';
    
}


?>