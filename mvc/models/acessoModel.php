<?php

namespace mvc\models;

class AcessoModel
{

    public function __construct()
    {
        if (isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
        }
    }

    public function logar($nome, $senha)
    {
        $sql = \MySql::conectar()->prepare("SELECT * FROM tb_usuarios WHERE nome = ?");
        $sql->execute([$nome]);

        $usuario = $sql->fetchAll();
        $hash = $usuario[0]['senha'];

        if (count($usuario) == 0 || !password_verify($senha, $hash)) {

            $erro = "<p id='erro'>Usuário ou senha incorretos!</p>";

            session_start();
            $_SESSION['erro'] = $erro;

            header("Location: acesso");
            die;

        } else {

            foreach ($usuario as $valor) {
                $id = $valor["id"];
                $nome = $valor['nome'];
            }

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;

            header('Location: home');
            die;

        }

    }
}