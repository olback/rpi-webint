<?php

// Load config.
require __DIR__ . '/config.php';
session_start();

if($_SESSION['username'] != $username){
    require __DIR__ . '/login.php';
} else {
    require __DIR__ . '/main.php';
}


?>