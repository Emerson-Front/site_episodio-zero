<?php

namespace mvc\controllers;

use mvc\models\HomeModel;


class HomeController
{

    public function index()
    {

        \mvc\views\MainView::render('home');

        if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
            header('Location: acesso');
            die;
        }


        if (isset($_POST["btn_adicionar"])) {
            $adicionar = new HomeModel;
            $adicionar->adicionar_anime($_POST['nome_anime_input'], 0, 0, $_SESSION['id']);
        }


        # Via AJAX -- Atualizar Anime
        if (isset($_POST['id_anime']) && isset($_POST['valor']) && isset($_POST['tipo'])) {
            $id_anime = $_POST['id_anime'];
            $valor = $_POST['valor'];
            $tipo = $_POST['tipo'];
            $atualizar = new HomeModel;
            $atualizar->atualizar_anime($id_anime, $valor, $tipo);
        }


        # Via AJAX -- Deletar/Concluir Anime
        if (isset($_POST["id_anime"]) && (isset($_POST['tipo']))) {
            $id_anime = $_POST['id_anime'];
            $tipo = $_POST['tipo'];
            $funcao = new HomeModel;
            $funcao->deletar_concluir($id_anime, $tipo);
        }


        # Via AJAX -- Avaliação (as 5 estrelas)
        if (isset($_POST['star']) && isset($_POST['id_anime'])) {
            $star = $_POST['star'];
            $id = $_POST['id_anime'];
            $funcao = new HomeModel;
            $funcao->avalicao($star, $id);
        }


        # Via AJAX -- Notas
        if (isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['notas']) && isset($_POST['id_anime'])) {
            $nome = $_POST['nome'];
            $notas = $_POST['notas'];
            $id = $_POST['id_anime'];
            $funcao = new HomeModel;
            $funcao->notas($nome, $notas, $id);
        }
    }

    static function pegar_animes()
    {
        $pegar_animes = new HomeModel;
        return $pegar_animes->pegar_anime();
    }

    static function pegar_concluidos()
    {
        $pegar_concluidos = new HomeModel;
        return $pegar_concluidos->pegar_concluidos();
    }

}

