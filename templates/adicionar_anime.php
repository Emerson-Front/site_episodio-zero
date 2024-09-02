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


    // Aqui vai o código para adicionar a capa
    # Pesquisa no banco de dados a capa do anime
    $tb_capa = new Sql();
    $tb_capa = $tb_capa->getBuscar_capa(); 
    $tb_capa = $pdo->prepare($tb_capa);
    $tb_capa->execute([$nome]);
    $capa = $tb_capa->fetchAll(PDO::FETCH_ASSOC);

    # Se não tiver capa vai pesquisar na ferramenta do google
    if (count($capa) == 0) {
        $url = Capa::construir_url(urlencode($nome));
        $resposta = file_get_contents($url);
        $dados = json_decode($resposta, true);

        # Se a ferramenta achar uma imagem manda pro banco o url da imagem
        if (isset($dados['items'][0]['link'])) {
            $image_url = $dados['items'][0]['link'];
            $sql = new Sql();
            $sql = $sql->getAdicionar_capa();
            $sql = $pdo->prepare($sql);
            $sql->execute([$nome, $image_url]);
        }

    }

    $sql = new Sql();
    $sql = $sql->getAdicionar();
    $sql = $pdo->prepare($sql);
    $sql->execute([$nome, $temporada, $episodio, $id_usuario]);

    Utilidades::atualizar();

}


?>