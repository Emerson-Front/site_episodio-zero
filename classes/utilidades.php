<?php

class Utilidades
{
    static function atualizar()
    {
        //Redirecionando para evitar reenvio do formulário
        header("Location: " . $_SERVER['PHP_SELF']);

    }


    // Validar usuario
    static function validarUsuario($nome)
    {
        // Define a expressão regular correspondente à regra dada
        $regex = '/^[A-Za-z0-9][A-Za-z0-9_-]{4,29}$/';

        // Verifica se a string corresponde à expressão regular
        if (preg_match($regex, $nome)) {
            return $nome; // O nome de usuário é válido
        } else {
            $erro = "<p id='erro'>Nome inválido!</p>";
            session_start();
            $_SESSION['erro'] = $erro;
            header("Location: " . $_SERVER['PHP_SELF']);
            die;
        }
    }

    static function conferir_senha($senha_registro, $senha_confirm)
    {
        $regex = '/^[^\s]{6,29}$/';

        if (((!preg_match($regex, $senha_registro)) && (!preg_match($regex, $senha_confirm))) || ($senha_registro != $senha_confirm)) {
            $erro = "<p id='erro'>Senhas não conferem!</p>";
            session_start();
            $_SESSION['erro'] = $erro;
            header("Location: " . $_SERVER['PHP_SELF']);
            die;
        } else {
            return $senha_registro;
        }
    }

}


?>