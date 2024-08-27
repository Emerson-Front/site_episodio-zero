<h3>Editar</h3>
<form action="" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="input" value="<?php echo $nome_anime ?>" placeholder="Digite o nome do anime">
    <label for="notas">Notas:</label>
    <textarea name="notas" id="notas" placeholder="Digite comentários para esse anime:"><?php echo $notas ?></textarea>

    <div class="botoes">
        <button class='btn_concluido' data-id="<?php echo $id ?>" type='button' name='salvar'><i
                class="bi bi-check2-all"></i></button>
        <button class='btn_deletar' data-id="<?php echo $id ?>" type='button' name='deletar'><i
                class="bi bi-trash"></i></button>
    </div>
</form>