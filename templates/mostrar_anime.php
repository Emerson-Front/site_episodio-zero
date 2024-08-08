<?php


// Receber o valores dos animes do banco de dados 

$sql = $pdo->prepare("SELECT * FROM `animes_lista`");
$sql->execute();
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
            <button class='btn_deletar' onclick='acao_deletar(<?php echo $key; ?>)' type='button'
                name='btn_deletar'><i class="bi bi-x"></i></button>
            <button class='btn_remover' onclick='acao_remover(<?php echo $key; ?>)' id='btn_remover_<?php echo $key; ?>'
                type='submit' name='btn_remover' value='<?php echo $value['id_anime']; ?>'>Remover?</button>
        </div>
      
    </form>
    <?php
}

require ("templates/deletar_anime.php");

?>




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