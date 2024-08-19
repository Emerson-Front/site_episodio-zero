<?php


class Sql
{

    /* Lista de Animes */

    private $adicionar = "INSERT INTO `animes_lista` (`nome_anime`, `temporada`, `episodio`, `id_usuario`) VALUES (?, ?, ?, ?)";

    private $deletar = "DELETE FROM `animes_lista` WHERE (`id_anime` = ?)";

    private $atualizar = "UPDATE `animes_lista` SET `temporada` = ?, `episodio` = ? WHERE (`id_anime` = ?)";

    public function getAdicionar()
    {
        return $this->adicionar;
    }

    public function getDeletar()
    {
        return $this->deletar;
    }

    public function getAtualizar()
    {
        return $this->atualizar;
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