<?php
include("../config.php");
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
    <title>Login Episódio Zero</title>
</head>

<body>

    <form action="" method="post" class="login">
        <h1>Login</h1>
        <label>Nome de Usuário:</label>
        <input type="text" placeholder="Digite seu nome de usuário" name="nome" required>
        <label>Senha:</label>
        <input type="password" placeholder="Digite sua senha" name="senha" required>
        <button type="submit">Entrar</button>
        <p>Ainda não tem uma conta?</p>
        <a href="registro.php">Criar conta</a>
    </form>

    <?php

    if (isset($_POST["nome"]) && isset($_POST["senha"])) {

        $nome = ucfirst($_POST['nome']);
        $senha = $_POST['senha'];

        $sql = new sql();
        $sql = $sql->getLogin();
        $sql = $pdo->prepare($sql);
        $sql->execute([$nome, $senha]);

        $usuario = $sql->fetchAll(PDO::FETCH_ASSOC);

        //count($usuario) Verifica se algum resultado foi encontrado.
        if (count($usuario) == 0) {

            $erro = "<p id='erro'>Usuário ou senha incorretos!</p>";
            
            session_start();
            $_SESSION['erro'] = $erro;

            header("Location: " . $_SERVER['PHP_SELF']);
            die;

        } else {
            foreach ($usuario as $valor) {
                $id = $valor["id"];
                $nome = $valor['nome'];
            }

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['nome'] = $nome;

            header('Location: /');

        }

    }


    ?>

</body>

</html>