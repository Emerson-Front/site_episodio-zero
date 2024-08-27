<h1><a href="/">Episódio Zero</a></h1>

<nav>

    <nav class="menu">
        <div class="usuario">
            <i class="bi bi-person-fill"></i>
            <p class="nome_usuario"><?php echo $_SESSION['nome'] ?></p>
            <i class="bi bi-caret-down-fill"></i>
        </div>

        <ul>
            <!--
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Menu</a></li>
            -->
            <form action="" method="post">
                <button type="submit" name="sair" class="btn_sair">Sair</button>
            </form>

        </ul>
    </nav>

</nav>

<?php

if (isset($_POST['sair'])) {
    session_destroy();
    header('Location: login/login.php');
}

?>