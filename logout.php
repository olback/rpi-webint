<?php
    session_start();
    $_SESSION['username'] = NULL;
    session_destroy();
    Header("Location: ./");
?>