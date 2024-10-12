<?php

namespace mvc\controllers;
use mvc\models\RegistroModel;

class RegistroController
{
    public function index()
    {

        \mvc\views\MainView::render('registro');


        if (isset($_POST['btn_registrar'])) {
            $nome_registro = RegistroModel::validarUsuario(ucfirst($_POST['nome_registro']));
            $email_registro = $_POST['email'];
            $senha_registro = RegistroModel::conferir_senha($_POST['senha_registro'], $_POST['senha_confirm']);
            // Consulta nome e email
            $consulta = new RegistroModel;
            if ($consulta->consultar_nome_email($nome_registro, $email_registro)) {
                $_SESSION['nome'] = $nome_registro;
                $_SESSION['email'] = $email_registro;
                $_SESSION['senha'] = $senha_registro;
                header("Location: verificacao");
                die();
            }


        }



    }

}