<?php


class Sql
{

    /* Lista de Animes */

    private $pegar_animes = "SELECT * FROM `animes_lista` WHERE `id_usuario` = ? ORDER BY `nome_anime`";

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


    /* Login */

    private $login = "SELECT * FROM tb_usuarios WHERE nome = ? AND senha = ?";
    public function getLogin()
    {
        return $this->login;
    }

    /* Registro de usuario */

    private $verifique = "SELECT * FROM tb_usuarios WHERE nome = ?";

    private $registrar = "INSERT INTO `tb_usuarios` (`nome`, `senha`) VALUES (?, ?)";
    public function getRegistrar_usuario()
    {
        return $this->registrar;
    }
    public function getVerifique()
    {
        return $this->verifique;
    }

}


?>