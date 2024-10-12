<?php

namespace mvc\controllers;
use mvc\models\VerificacaoModel;

class VerificacaoController
{
    public function index()
    {

        \mvc\views\MainView::render('verificacao');


        if (isset($_POST['validar'])) {
            // Enviar código no email
            $codigo = rand(1000, 9999);
            $destinatario = $_SESSION['email'];

            $enviar = new VerificacaoModel;
            $enviar->enviarCodigo($destinatario, $codigo);

        }
    }

    public static function display($display)
    {
        if ($display === 'grid') {
            return 'grid';
        } else {
            return 'none';
        }

    }


}