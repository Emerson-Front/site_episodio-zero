<?php

class Utilidades
{
    static function atualizar()
    {
        //Redirecionando para evitar reenvio do formulário
        header("Location: " . $_SERVER['PHP_SELF']);


    }
}
?>