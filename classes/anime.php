<?php


class Anime
{
    private $nome;
    private $temporada;
    private $episodio;
    private $id_usuario;


    public function adicionar($nome, $temporada, $episodio, $id_usuario)
    {
        $this->nome = $nome;
        $this->temporada = $temporada;
        $this->episodio = $episodio;
        $this->id_usuario = $id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getTemporada()
    {
        return $this->temporada;
    }
    public function getEpisodio()
    {
        return $this->episodio;
    }



}

?>