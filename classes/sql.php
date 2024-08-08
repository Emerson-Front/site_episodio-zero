<?php


class Sql
{

    private $adicionar = "INSERT INTO `animes_lista` (`nome_anime`, `temporada`, `episodio`) VALUES (?, ?, ?)";

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
}


?>