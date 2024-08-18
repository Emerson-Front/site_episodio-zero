<?php
include("../config.php");
include('../classes/utilidades.php');
include('../classes/sql.php');

?>

<?php
// Inicia a sessão no início da página
session_start();
// Verifica se existe uma mensagem de erro armazenada na sessão
if (isset($_SESSION['erro'])) {
    echo $_SESSION['erro'];
    unset($_SESSION['erro']); // Limpa a mensagem de erro após exibir
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../ico/zero.ico" type="image/x-icon">
    <title>Registro Episódio Zero</title>
</head>

<body>


    <form action="" method="post" class="registrar">
        <h1>Registrar</h1>

        <label>Crie um nome de Usuário:</label>
        <input type="text" placeholder="Digite o nome de usuário" id="nome_registro" name="nome_registro" required>
        <span id="mensagem_nome" class="mensagem"></span>

        <label>Senha:</label>
        <input type="password" placeholder="Digite sua senha" name="senha_registro" id="senha_registro" required>
        <span id="mensagem_senha" class="mensagem"></span>

        <label>Repita sua senha:</label>
        <input type="password" placeholder="Digite sua senha" name="senha_confirm" id="senha_confirm" required>
        <span id="mensagem_senha_confirm" class="mensagem"></span>

        <button type="submit" id="btn_registrar" name="btn_registrar" disabled>Criar</button>

        <p>Já tem uma conta?</p>
        <a href="login.php">Faça seu login</a>
    </form>

    <?php

    if (isset($_POST['nome_registro']) && isset($_POST['senha_registro']) && isset($_POST['senha_confirm'])) {

        $nome_registro = Utilidades::validarUsuario(ucfirst($_POST['nome_registro']));
        $senha_registro = Utilidades::conferir_senha($_POST['senha_registro'], $_POST['senha_confirm']);


        $sql = new Sql();
        $sql = $sql->getRegistrar_usuario();
        $sql = $pdo->prepare($sql);
        $sql->execute([$nome_registro, $senha_registro]);


        $sql = new sql();
        $sql = $sql->getLogin();
        $sql = $pdo->prepare($sql);
        $sql->execute([$nome_registro, $senha_registro]);
        $usuario = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuario as $valor) {
            $id = $valor['id'];
            $nome = $valor['nome'];
            $senha = $valor['senha'];
        }

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;

        header('Location: /');
    }




    ?>

    <script src="../js/registro.js"></script>

</body>

</html>