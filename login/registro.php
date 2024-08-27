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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../ico/zero.ico" type="image/x-icon">

    <script src="../js/jquery-3.7.1.min.js"></script>
    <title>Registro Episódio Zero</title>

</head>

<body>


    <form action="" method="post" class="registrar">
        <h1>Registrar</h1>

        <label>Crie um nome de Usuário:</label>
        <input type="text" placeholder="Digite o nome de usuário" id="nome_registro" name="nome_registro" required>
        <span id="mensagem_nome" class="mensagem"></span>

        <label>E-mail:</label>
        <input type="email" placeholder="Digite seu e-mail" id="email_registro" name="email" required>
        <span id="mensagem_nome" class="mensagem"></span>

        <label>Senha:</label>
        <input type="password" placeholder="Digite sua senha" name="senha_registro" id="senha_registro" required>
        <span id="mensagem_senha" class="mensagem"></span>

        <label>Repita sua senha:</label>
        <input type="password" placeholder="Digite sua senha" name="senha_confirm" id="senha_confirm" required>
        <span id="mensagem_senha_confirm" class="mensagem"></span>

        <button type="submit" id="btn_registrar" name="btn_registrar">Criar</button>

        <p>Já tem uma conta?</p>
        <a href="login.php">Faça seu login</a>
    </form>

    <?php

    if (isset($_POST['nome_registro']) && isset($_POST['email']) && isset($_POST['senha_registro']) && isset($_POST['senha_confirm'])) {

        $nome_registro = Utilidades::validarUsuario(ucfirst($_POST['nome_registro']));
        $email_registro = $_POST['email'];
        $senha_registro = Utilidades::conferir_senha($_POST['senha_registro'], $_POST['senha_confirm']);

        // Consulta nome
        //count($usuario) Verifica se algum resultado foi encontrado.
        $sql = new Sql();
        $sql = $sql->getVerifique_nome();
        $sql = $pdo->prepare($sql);
        $sql->execute([$nome_registro]);
        $resultado_nome = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Consulta e-mail
        $sql = new Sql();
        $sql = $sql->getVerifique_email();
        $sql = $pdo->prepare($sql);
        $sql->execute([$email_registro]);
        $resultado_email = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultado_nome) != 0) {
            $erro = "<p id='erro'>Nome de usuário já existe!</p>";
            session_start();
            $_SESSION['erro'] = $erro;
            header("Location: " . $_SERVER['PHP_SELF']);
            die;

        } else if (count($resultado_email) != 0) {
            $erro = "<p id='erro'>E-mail já cadastrado!</p>";
            session_start();
            $_SESSION['erro'] = $erro;
            header("Location: " . $_SERVER['PHP_SELF']);
            die;

        } else {

            $_SESSION['nome'] = $nome_registro;
            $_SESSION['email'] = $email_registro;
            $_SESSION['senha'] = $senha_registro;
            header("Location: verificacao.php");
            die();
        }
    }

    ?>


    <script src="../js/registro.js"></script>

</body>

</html>