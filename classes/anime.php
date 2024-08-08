<?php


class Anime
{
    private $nome;
    private $temporada;
    private $episodio;


    public function adicionar($nome, $temporada, $episodio)
    {
        $this->nome = $nome;
        $this->temporada = $temporada;
        $this->episodio = $episodio;
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