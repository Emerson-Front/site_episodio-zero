<form method="post">

    <input class="nome_anime_input" type="text" name="nome_anime_input" placeholder="Digite o nome do anime" required>
    <input type="submit" name="btn_adicionar" class="btn_adicionar" value="Adicionar Anime"></input>

</form>


<?php

// Adicionar anime

if (isset($_POST["btn_adicionar"])) {
    $anime = new Anime();
    $anime->adicionar($_POST["nome_anime_input"], 0, 0);
    $nome = $anime->getNome();
    $temporada = $anime->getTemporada();
    $episodio = $anime->getEpisodio();


    // Enviando pro bando de dados                  
    $sql = new Sql();
    $sql = $sql->getAdicionar();
    $sql = $pdo->prepare($sql);
    $sql->execute([$nome, $temporada, $episodio]);

    Utilidades::atualizar();

}


?>