<?php

namespace mvc\models;

class RegistroModel
{
    public function __construct()
    {
        if (isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
        }
    }
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
            header('Location: registro');
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
            header("Location: registro");
            die;
        } else {
            return $senha_registro;
        }
    }

    public function consultar_nome($nome_registro)
    {
        // Consulta nome         
        $sql = \MySql::conectar()->prepare("SELECT * FROM tb_usuarios WHERE nome = ?");
        $sql->execute([$nome_registro]);
        $resultado_nome = $sql->fetchAll();


        //count($usuario) Verifica se algum resultado foi encontrado.
        if (count($resultado_nome) != 0) {
            $erro = "<p id='erro'>Nome de usuário já existe!</p>";
            session_start();
            $_SESSION['erro'] = $erro;
            header("Location: " . $_SERVER['PHP_SELF']);
            die;

        } else
            return true;

    }

    public function cadastrar($nome_registro, $senha_registro)
    {
        $usuario = $nome_registro;
        $hash = password_hash($senha_registro, PASSWORD_DEFAULT);

        $sql = \MySql::conectar()->prepare("INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, ?, NULL, ?)");
        $sql->execute([$usuario, $hash]);

        # Pegar o ID
        $sql = \MySql::conectar()->prepare("SELECT * FROM `tb_usuarios` WHERE nome = ?;");
        $sql->execute([$usuario]);
        $sql = $sql->fetch();
        $id = $sql['id'];
        
        $_SESSION['nome'] = $usuario;
        $_SESSION['id'] = $id;
        header("Location: home");
        die();

    }

}