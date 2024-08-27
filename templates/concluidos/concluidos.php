<?php

$sql = new sql();
$sql = $sql->getConcluidos();
$sql = $pdo->prepare($sql);
$sql->execute([$_SESSION['id']]);
$concluidos = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($concluidos as $key => $value) {
    $data = $value['data_concluido'];
    $dataTime = new DateTime($data);
    $data = $dataTime->format('d/m/Y');

    $avaliacao = $value['avaliacao'];

    $id = $value['id_anime'];
    $nome_anime = $value['nome_anime'];
    $notas = $value['notas'];

    ?>
    <div id="anime_<?php echo $id ?>" class="concluido">
        <img src="imagens/capa/padrao.jpeg" alt="Imagem do Anime">
        <div class="detalhes">
            <p class="nome"><?php echo $nome_anime ?></p>
            <p class="data">Data de Conclusão: <?php echo $data ?></p>
            <div class="avaliacao">
                <p class="avaliacao" data-star="<?php echo $avaliacao ?>">Avaliação: </p>
                <span class="stars">
                    <?php require 'stars.php' ?>
                </span>
            </div>
            <p class="notas"><span>Notas: </span><?php echo $value['notas'] ?></p>
        </div>

        <i id="editar_<?php echo $id ?>" data-nome="<?php echo $nome_anime ?>" class="bi bi-pencil-square"></i>

        <div data-nome="<?php echo $nome_anime ?>" class="editar">
            <?php require 'editar.php' ?>
        </div>

    </div>
    <?php
}


if (isset($_POST['tipo']) && isset($_POST['nome']) && isset($_POST['notas']) && isset($_POST['id_anime'])) {

    $nome = $_POST['nome'];
    $notas = $_POST['notas'];
    $id = $_POST['id_anime'];

    if ($_POST['tipo'] === 'salvar') {
        $sql = new sql;
        $sql = $sql->getAtualizar_concuido();
        $sql = $pdo->prepare($sql);
        $sql->execute([$nome, $notas, $id]);

    } else if ($_POST['tipo'] === 'deletar') {
        $sql = new sql;
        $sql = $sql->getDeletar_concluido();
        $sql = $pdo->prepare($sql);
        $sql->execute([$id]);
    }

}


if (isset($_POST['star']) && isset($_POST['id_anime'])) {

    $star = $_POST['star'];
    $id = $_POST['id_anime'];

    $sql = $pdo->prepare("UPDATE `tb_concluidos` SET `avaliacao` = ? WHERE (id_anime = ?)");
    $sql->execute([$star, $id]);
}


?>