<?php

// Deletar anime

if (isset($_GET["btn_remover"])) {

    $id_anime = $_GET['btn_remover'];

    $sql = new sql();
    $sql = $sql->getDeletar();
    $sql = $pdo->prepare($sql);

    $sql->execute([$id_anime]);



}


?>


<script>
    function acao_deletar(key) {
        var btn_remover = document.getElementById('btn_remover_' + key);
        btn_remover.style.display = 'block';
    }
/*
    function acao_remover(key) {
        var deleteDiv = document.getElementById('anime_' + key);
        deleteDiv.parentNode.removeChild(deleteDiv);

    }
*/
</script>