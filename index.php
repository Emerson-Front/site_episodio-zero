<?php

if (!isset($_SESSION)) {
    session_start();
}


$autoload = function ($class) {

    $diretorio = ['mvc', 'core', 'src'];

    if ($class === 'core\Application') {
        require 'core/application.php';
        return;
    }

    foreach ($diretorio as $index) {
        $arquivo = "$index/$class.php";
        if (file_exists($arquivo)) {
            include $arquivo;
            return;
        }
    }

    die("<p>Classe <b>$class</b> não localizada!</p>");

};

spl_autoload_register($autoload);



$app = new core\Application;
$app->executar();
