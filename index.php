<?php

include("config.php");
include("classes/utilidades.php");
require("classes/sql.php");
require("classes/anime.php");
require("login/session.php");

?>






<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="ico/zero.ico" type="image/x-icon">

    <script src="js/jquery-3.7.1.min.js"></script>
    <script type="module" src="js/main.js"></script>

    <title>Episódio Zero</title>

</head>

<body>

    <header>
        <?php require('templates/header.php'); ?>
    </header>

    <p></p>


    <div class="box">

        <nav class="container">
            <!--Adicionar anime-->
            <?php
            require('templates/adicionar_anime.php');
            require("templates/calendario.php");
            require('templates/lista_anime/lista_anime.php');
            ?>
          
        </nav>
    </div>



    <div class="box">
        <nav class="container">

            <h1>Concluídos</h1>
            <p style="color: white;">(Em desenvolvimento)</p>
            <ul id="container">
                <?php require ('templates/concluidos/concluidos.php') ?>

                <!--Lista preenchida dinamicamente-->

            </ul>


        </nav>
    </div>

    <footer>
        <?php require('templates/footer.html') ?>
    </footer>






</body>

</html>