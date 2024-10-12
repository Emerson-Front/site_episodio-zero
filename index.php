<?php

include 'core/autoload.php';

if (!isset($_SESSION)) {
    session_start();
}


$app = new \core\Application;
$app->executar();
