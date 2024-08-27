<?php
/**
 * Deleta animes
 * 
 * Valores recebidos via AJAX js\scripts\checkbox.js
 */




if (isset($_POST["id_anime"]) && (isset($_POST['tipo']))) {

    $id_anime = $_POST['id_anime'];
    $tipo = $_POST['tipo'];
    $data = date("Y-m-d"); 

    if ($tipo === 'deletar') {
        $sql = new sql();
        $sql = $sql->getDeletar();
        $sql = $pdo->prepare($sql);
        $sql->execute([$id_anime]);

    } else if ($tipo === 'concluir') {
        $sql = new sql();
        $sql = $sql->getConcluir();
        $sql = $pdo->prepare($sql);
        $sql->execute([$data, $id_anime]);

        $sql = new sql();
        $sql = $sql->getDeletar();
        $sql = $pdo->prepare($sql);
        $sql->execute([$id_anime]);
    }


}

?>