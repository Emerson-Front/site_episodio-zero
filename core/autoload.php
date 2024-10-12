<?php

spl_autoload_register(function ($class) {

    switch ($class) {
        case 'core\Application':
            return require 'core/application.php';

        case 'MySql':
            return require 'core/mysql.php';

        case 'Config':
            return require 'core/config.php';
    }

    // Converte o namespace em caminho de arquivo
    $caminho = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Inclui o arquivo se ele existir
    if (file_exists($caminho)) {
        require $caminho;
    } else {
        header('Location: erro');
        die;
        //echo "Arquivo não encontrado: $caminho";
        //echo '<br>';
        //echo "Classe: $class"; 
    }

});