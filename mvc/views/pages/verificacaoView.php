<?php
$grid = mvc\controllers\VerificacaoController::display('grid');
$none = mvc\controllers\VerificacaoController::display('none');
?>
<div class="fundo_login"></div>

<?php if (!isset($_POST['validar'])) { ?>
    <form method="post" class="login verificacao" style="display: <?= $grid ?> ">
        <label>Valide seu e-mail:</label>
        <label id="label"><?php echo $_SESSION['email'] ?></label>
        <button type="submit" name="validar" id="validar">Validar</button>
        <a href="registro">Cancelar</a>
    </form>
<?php } ?>


<?php if (isset($_POST['validar'])) { ?>
    <form method="post" class="login verificacao" style="display: <?= $grid ?> ">
        <input type="text" placeholder="Digite o código" id="codigo" name="codigo">
        <button type="submit" id="enviar">Enviar</button>
        <a href="registro">Cancelar</a>
    </form>
<?php } ?>