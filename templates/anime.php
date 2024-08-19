<?php


// Receber o valores dos animes do banco de dados 

$sql = $pdo->prepare("SELECT * FROM `animes_lista` WHERE `id_usuario` = ?");
$sql->execute([$_SESSION['id']]);
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($lista as $key => $value) {
    ?>
    <form method="get">
        <div class='anime' id='anime_<?php echo $key; ?>'>
            <p class='nome_anime'><?php echo $value['nome_anime']; ?></p>
            <p class='temporada'>Temporada:
                <input id='numberInput_temp_<?php echo $key; ?>' type='number' name='valor_temp'
                    value='<?php echo $value['temporada']; ?>' min='0' max='9999'>
            </p>
            <button type='button' onclick='decremento_temp(<?php echo $key; ?>)'>-</button>
            <button type='button' onclick='incremento_temp(<?php echo $key; ?>)'>+</button>
            <p class='Ep'>Ep:
                <input id='numberInput_ep_<?php echo $key; ?>' type='number' name='valor_ep'
                    value='<?php echo $value['episodio']; ?>' min='0' max='9999'>
            </p>
            <button type='button' onclick='decremento_ep(<?php echo $key; ?>)'>-</button>
            <button type='button' onclick='incremento_ep(<?php echo $key; ?>)'>+</button>
            <button id='btn_salvar_<?php echo $key; ?>' class='btn_salvar' type='submit' name='btn_salvar'
                value='<?php echo $value['id_anime']; ?>'><i class="bi bi-check2"></i></button>

            <input type="checkbox" id="check" name="check" />
        </div>
    </form>
    <?php
}
require("templates/deletar_anime.php");
?>

<div class="botoes">
    <button class="atualizar" onclick="atualizar()"><i class="bi bi-arrow-clockwise"></i></button>
    <button class='btn_concluido' type='submit' name='btn_deletar'><i class="bi bi-check2-all"></i></button>
    <button class='btn_deletar' type='submit' name='btn_deletar'><i class="bi bi-trash"></i></button>
</div>


<?php

// Atualizar o banco de dados com os incrementos de temporada e episodio

if (isset($_GET['btn_salvar'])) {

    $id_anime = $_GET['btn_salvar'];
    $valor_temp = $_GET['valor_temp'];
    $valor_ep = $_GET['valor_ep'];
    $sql = new Sql();
    $sql = $sql->getAtualizar();
    $sql = $pdo->prepare($sql);
    $sql->execute([$valor_temp, $valor_ep, $id_anime]);
}

?>


<!--Botões de incremento-->
<script>

    // Função para fazer o botão salvar aparecer
    function btn_salvar_block(key) {
        var btn_salvar = document.getElementById('btn_salvar_' + key);
        btn_salvar.style.display = 'block';
    }


    function incremento_temp(key) {
        var input = document.getElementById('numberInput_temp_' + key);
        input.stepUp();

        btn_salvar_block(key);

    }

    function decremento_temp(key) {
        var input = document.getElementById('numberInput_temp_' + key);
        input.stepDown();

        btn_salvar_block(key);
    }

    function incremento_ep(key) {
        var input = document.getElementById('numberInput_ep_' + key);
        input.stepUp();

        btn_salvar_block(key);
    }

    function decremento_ep(key) {
        var input = document.getElementById('numberInput_ep_' + key);
        input.stepDown();

        btn_salvar_block(key);
    }



</script>