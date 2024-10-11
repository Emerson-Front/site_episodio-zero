<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/site_episodio-zero/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/mvc/views/pages/imagens/zero.ico" type="image/x-icon">

    <script src="js/jquery-3.7.1.min.js"></script>
    <script type="module" src="js/main.js"></script>

    <title>Episódio Zero</title>



</head>

<body>

    <?php

    $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Faça o Login!';

    if ($nome != "Faça o Login!") {
        $display = 'block';
    } else {
        $display = 'none';
    }

    ?>

    <header>


        <h1><a href="home">Episódio Zero</a></h1>

        <nav>

            <nav class="menu">
                <div class="usuario">
                    <i class="bi bi-person-fill"></i>
                    <p class="nome_usuario"> <?= $nome ?> </p>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
                <ul>
                    <!--
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
            -->
                    <form action="" method="post" style="display: <?= $display ?> ">
                        <button type="submit" name="sair" class="btn_sair">Sair</button>
                    </form>

                </ul>
            </nav>

        </nav>

    </header>

    <?php

    if (isset($_POST['sair'])) {
        session_destroy();
        header('Location: acesso');
        die;
    }

    ?>


    <script>
        $('div.usuario').click(function () {
            $('header nav ul').slideToggle(200);
        });
    </script>