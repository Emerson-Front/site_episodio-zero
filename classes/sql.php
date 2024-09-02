<?php


class Sql
{

    /* Lista de Animes */
    private $pegar_animes = "SELECT animes_lista.*, capa_anime.url FROM animes_lista LEFT JOIN capa_anime ON animes_lista.nome_anime = capa_anime.nome_anime WHERE animes_lista.id_usuario = ? ORDER BY animes_lista.nome_anime";

    private $adicionar = "INSERT INTO `animes_lista` (`nome_anime`, `temporada`, `episodio`, `id_usuario`) VALUES (?, ?, ?, ?)";

    private $deletar = "DELETE FROM `animes_lista` WHERE (`id_anime` = ?)";

    private $atualizar_temp = "UPDATE `animes_lista` SET temporada = ? WHERE (`id_anime` = ?)";

    private $atualizar_ep = "UPDATE `animes_lista` SET episodio = ? WHERE (`id_anime` = ?)";

    public function getPegarAnime()
    {
        return $this->pegar_animes;
    }
    public function getAdicionar()
    {
        return $this->adicionar;
    }
    public function getDeletar()
    {
        return $this->deletar;
    }
    public function getAtualizar_temp()
    {
        return $this->atualizar_temp;
    }
    public function getAtualizar_ep()
    {
        return $this->atualizar_ep;
    }


    /* Animes concluidos */
    private $concluidos = "SELECT tb_concluidos.*, capa_anime.url FROM tb_concluidos LEFT JOIN capa_anime ON tb_concluidos.nome_anime = capa_anime.nome_anime WHERE tb_concluidos.id_usuario = ? ORDER BY tb_concluidos.nome_anime";

    private $concluir = "INSERT INTO tb_concluidos (id_anime, nome_anime, data_concluido, id_usuario) SELECT id_anime, nome_anime, ?, id_usuario FROM animes_lista WHERE id_anime = ?";
    private $atualizar_concluido = "UPDATE `tb_concluidos` SET `nome_anime` = ?, `notas` = ? WHERE (`id_anime` = ?)";
    private $deletar_concluido = "DELETE FROM `tb_concluidos` WHERE (`id_anime` = ?)";

    public function getConcluidos()
    {
        return $this->concluidos;
    }
    public function getConcluir()
    {
        return $this->concluir;
    }
    public function getAtualizar_concuido()
    {
        return $this->atualizar_concluido;
    }
    public function getDeletar_concluido()
    {
        return $this->deletar_concluido;
    }



    /* Capas dos animes */
    private $buscar_capa = "SELECT * FROM capa_anime WHERE nome_anime = ?";
    private $adicionar_capa = "INSERT INTO capa_anime (`nome_anime`, `url`) VALUES (?, ?)";

    public function getBuscar_capa()
    {
        return $this->buscar_capa;
    }

    public function getAdicionar_capa()
    {
        return $this->adicionar_capa;
    }




    /* Login */

    private $nome_usuario = "SELECT * FROM tb_usuarios WHERE nome = ?";
    public function getNome_usuario()
    {
        return $this->nome_usuario;
    }


    /* Registro de usuario */
    private $verifique_nome = "SELECT * FROM tb_usuarios WHERE nome = ?";
    private $verifique_email = "SELECT * FROM tb_usuarios WHERE email = ?";
    private $registrar = "INSERT INTO `tb_usuarios` (`nome`, `email`, `senha`) VALUES (?, ?, ?)";
    private $logar = "SELECT * FROM tb_usuarios WHERE nome = ? AND senha = ?";
    public function getRegistrar_usuario()
    {
        return $this->registrar;
    }
    public function getVerifique_nome()
    {
        return $this->verifique_nome;
    }
    public function getVerifique_email()
    {
        return $this->verifique_email;
    }
    public function getLogar()
    {
        return $this->logar;
    }

}


?>