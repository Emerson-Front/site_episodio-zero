<?php

include ("config.php");
include ("classes/utilidades.php");
require ("classes/sql.php");
require ("classes/anime.php");

?>






<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="ico/zero.ico" type="image/x-icon">
    <title>Episódio Zero</title>

</head>

<body>
<a href="ico/zero.ico"></a>

    <header>
        <?php require ('templates/header.html'); ?>
    </header>

    
    <div class="box">

        <nav class="container">
            <!--Adicionar anime-->
            <?php
            require ('templates/adicionar_anime.php');
            require ("templates/calendario.php");
            require ('templates/mostrar_anime.php');
            ?>
            <button class="atualizar" onclick="atualizar()"><i class="bi bi-arrow-clockwise"></i></button>
        </nav>
    </div>

    <div class="box">
        <nav class="container">

            <h1>Concluídos</h1>
            <p style="color: white;">(Em desenvolvimento)</p>
            <ul id="container">

                <!--Lista preenchida dinamicamente-->

            </ul>


        </nav>
    </div>

    <footer>
        <?php require ('templates/footer.html') ?>
    </footer>


    <script src="js/script.js"></script>

</body>

</html>

