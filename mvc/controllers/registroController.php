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
            $senha_registro = RegistroModel::conferir_senha($_POST['senha_registro'], $_POST['senha_confirm']);
            // Consulta nome
            $consulta = new RegistroModel;
            if ($consulta->consultar_nome($nome_registro)) {
                $cadastrar = new RegistroModel();
                $cadastrar->cadastrar($nome_registro, $senha_registro);
            }


        }



    }

}