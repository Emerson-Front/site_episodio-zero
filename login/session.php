<?php

if (!isset($_SESSION)) {
    session_start();

    if ($_SESSION == null) {
        header("Location: login/login.php");
    }
}

?>