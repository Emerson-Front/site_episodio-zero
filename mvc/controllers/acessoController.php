<?php

namespace controllers;
use models\AcessoModel;

class AcessoController
{
    public function index()
    {

        \views\MainView::render('acesso');

        
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