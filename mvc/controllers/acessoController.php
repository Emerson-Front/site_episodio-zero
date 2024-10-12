<?php

namespace mvc\controllers;
use mvc\models\AcessoModel;

class AcessoController
{
    public function index()
    {

        \mvc\views\MainView::render('acesso');

        
        if (isset($_POST['entrar'])) {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            $logar = new AcessoModel;
            $logar->logar($nome, $senha);
        } else {
            new AcessoModel();
        }

    }

}