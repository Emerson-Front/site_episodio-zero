<form method="post">
    <input class="nome_anime_input" type="text" name="nome_anime_input" placeholder="Digite o nome do anime" required>
    <button type="submit" name="btn_adicionar" class="btn_adicionar">Adicionar Anime</button>
</form>


<?php

// Adicionar anime

if (isset($_POST["btn_adicionar"])) {

    $nome = strip_tags($_POST['nome_anime_input']);
    $temporada = 0;
    $episodio = 0;
    $id_usuario = $_SESSION['id'];
               
    $sql = new Sql();
    $sql = $sql->getAdicionar();
    $sql = $pdo->prepare($sql);
    $sql->execute([$nome, $temporada, $episodio, $id_usuario]);

   Utilidades::atualizar();

}


?>