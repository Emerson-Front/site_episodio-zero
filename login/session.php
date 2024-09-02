<?php

if (!isset($_SESSION)) {
    session_start();

    if ($_SESSION == null || !isset($_SESSION['id'])) {
        session_destroy();
        header("Location: login/login.php");
    }
}

?>