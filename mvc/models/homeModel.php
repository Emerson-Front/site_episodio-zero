<?php

namespace models;

class HomeModel
{
    public function adicionar_anime($nome, $temporada, $episodio, $id_usuario)
    {

        $nome = strip_tags($nome);

        // Aqui vai o código para adicionar a capa
        # Pesquisa no banco de dados a capa do anime
        $tb_capa = \MySql::conectar()->prepare("SELECT * FROM capa_anime WHERE nome_anime = ?");
        $tb_capa->execute([$nome]);
        $capa = $tb_capa->fetchAll();

        # Se não tiver capa vai pesquisar na ferramenta do google
        if (count($capa) == 0) {
            require 'core/capa.php';
            $url = \core\Capa::construir_url(urlencode($nome));
            $resposta = file_get_contents($url);
            $dados = json_decode($resposta, true);

            # Se a ferramenta achar uma imagem manda pro banco o url da imagem
            if (isset($dados['items'][0]['link'])) {
                $image_url = $dados['items'][0]['link'];
                $sql = \MySql::conectar()->prepare("INSERT INTO capa_anime (`nome_anime`, `url`) VALUES (?, ?)");
                $sql->execute([$nome, $image_url]);
            }

        }

        $sql = \MySql::conectar()->prepare("INSERT INTO `animes_lista` (`nome_anime`, `temporada`, `episodio`, `id_usuario`) VALUES (?, ?, ?, ?)");
        $sql->execute([$nome, $temporada, $episodio, $id_usuario]);

        echo '<script>window.location.href = "home"</script>';

    }

    public function pegar_anime()
    {
        $sql = \MySql::conectar()->prepare("SELECT animes_lista.*, capa_anime.url FROM animes_lista LEFT JOIN capa_anime ON animes_lista.nome_anime = capa_anime.nome_anime WHERE animes_lista.id_usuario = ? ORDER BY animes_lista.nome_anime");
        $sql->execute([$_SESSION['id']]);
        $lista = $sql->fetchAll();
        return $lista;
    }

    public function pegar_concluidos()
    {
        $sql = \MySql::conectar()->prepare("SELECT tb_concluidos.*, capa_anime.url FROM tb_concluidos LEFT JOIN capa_anime ON tb_concluidos.nome_anime = capa_anime.nome_anime WHERE tb_concluidos.id_usuario = ? ORDER BY tb_concluidos.nome_anime");
        $sql->execute([$_SESSION['id']]);
        $concluidos = $sql->fetchAll();
        return $concluidos;
    }

    public function atualizar_anime($id_anime, $valor, $tipo)
    {
        // Verifica o tipo de atualização (temporada ou episódio)
        if ($tipo === 'temporada') {
            $sql = \MySql::conectar()->prepare("UPDATE `animes_lista` SET temporada = ? WHERE (`id_anime` = ?)");
            $sql->execute([$valor, $id_anime]);

        } else if ($tipo === 'episodio') {
            $sql = \MySql::conectar()->prepare("UPDATE `animes_lista` SET episodio = ? WHERE (`id_anime` = ?)");
            $sql->execute([$valor, $id_anime]);
        }
    }

    public function deletar_concluir($id_anime, $tipo)
    {
        $data = date("Y-m-d");

        if ($tipo === 'deletar') {
            $sql = \MySql::conectar()->prepare("DELETE FROM `animes_lista` WHERE (`id_anime` = ?)");
            $sql->execute([$id_anime]);

        } else if ($tipo === 'concluir') {
            $sql = \Mysql::conectar()->prepare("INSERT INTO tb_concluidos (id_anime, nome_anime, data_concluido, id_usuario) SELECT id_anime, nome_anime, ?, id_usuario FROM animes_lista WHERE id_anime = ?");
            $sql->execute([$data, $id_anime]);

            $sql = \MySql::conectar()->prepare("DELETE FROM `animes_lista` WHERE (`id_anime` = ?)");
            $sql->execute([$id_anime]);
        }
    }

    public function avalicao($star, $id_anime)
    {

        $sql = \MySql::conectar()->prepare("UPDATE `tb_concluidos` SET `avaliacao` = ? WHERE (id_anime = ?)");
        $sql->execute([$star, $id_anime]);
    }

    public function notas($nome, $notas, $id_anime)
    {
        $nome = strip_tags($nome);
        $notas = strip_tags($notas);

        if ($_POST['tipo'] === 'salvar') {
            $sql = \MySql::conectar()->prepare("UPDATE `tb_concluidos` SET `nome_anime` = ?, `notas` = ? WHERE (`id_anime` = ?)");
            $sql->execute([$nome, $notas, $id_anime]);

        } else if ($_POST['tipo'] === 'deletar') {
            $sql = \MySql::conectar()->prepare("DELETE FROM `tb_concluidos` WHERE (`id_anime` = ?)");
            $sql->execute([$id_anime]);
        }
    }

}