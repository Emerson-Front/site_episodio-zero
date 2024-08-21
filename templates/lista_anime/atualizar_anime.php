<?php
/**
 * Atualizar valores de temporada e episódio
 * 
 * Valores recebidos via AJAX js\scripts\atualizar_anime.js
 */

if (isset($_POST['id_anime']) && isset($_POST['valor']) && isset($_POST['tipo'])) {
    $id_anime = $_POST['id_anime'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];

    // Verifica o tipo de atualização (temporada ou episódio)
    if ($tipo === 'temporada') {
        $sql = new sql();
        $sql = $sql->getAtualizar_temp();
        $sql = $pdo->prepare($sql);
        $sql->execute([$valor, $id_anime]);

    } else if ($tipo === 'episodio') {
        $sql = new sql();
        $sql = $sql->getAtualizar_ep();
        $sql = $pdo->prepare($sql);
        $sql->execute([$valor, $id_anime]);
    }

}
?>