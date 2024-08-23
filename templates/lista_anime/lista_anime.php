<?php
require("deletar_anime.php");
require('atualizar_anime.php');


// Receber o valores dos animes do banco de dados 
$sql = new sql();
$sql = $sql->getPegarAnime();
$sql = $pdo->prepare($sql);
$sql->execute([$_SESSION['id']]);
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($lista as $key => $value) {
    ?>

    <form method="get">
        <div class='anime' id='<?php echo $value['id_anime']; ?>'>
            <p class='nome_anime'><?php echo $value['nome_anime']; ?></p>
            <p class='temporada'>Temporada:
                <input id='numberInput_temp<?php echo $key; ?>' type='number' name='valor_temp'
                    value='<?php echo $value['temporada']; ?>' min='0' max='9999'>
            </p>
            <button type='button' id='decremento_temp<?php echo $key; ?>'>-</button>
            <button type='button' id='incremento_temp<?php echo $key; ?>'>+</button>
            <p class='Ep'>Ep:
                <input id='numberInput_ep<?php echo $key; ?>' type='number' name='valor_ep'
                    value='<?php echo $value['episodio']; ?>' min='0' max='9999'>
            </p>
            <button type='button' id='decremento_ep<?php echo $key; ?>'>-</button>
            <button type='button' id='incremento_ep<?php echo $key; ?>'>+</button>

            <input type="checkbox" id="<?php echo $value['id_anime']; ?>" class="input_check" />
        </div>
    </form>
    <?php
}

?>

<div class="botoes">
    <button class='btn_concluido' type='submit' name='btn_deletar'><i class="bi bi-check2-all"></i></button>
    <button class='btn_deletar' type='submit' name='btn_deletar'><i class="bi bi-trash"></i></button>
</div>


