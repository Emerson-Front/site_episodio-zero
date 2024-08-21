<?php
/**
 * Deleta animes
 * 
 * Valores recebidos via AJAX js\scripts\deletar_anime.js
 */

if (isset($_POST["id_anime"]) && !isset($_POST['valor']) && !isset($_POST['tipo'])) {
    $id_anime = $_POST['id_anime'];
    $sql = new sql();
    $sql = $sql->getDeletar();
    $sql = $pdo->prepare($sql);
    $sql->execute([$id_anime]);
}

?>