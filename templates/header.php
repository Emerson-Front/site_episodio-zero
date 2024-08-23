<h1><a href="/">Episódio Zero</a></h1>

<nav>
    <ul>
        <li><a href="#">Menu</a></li>
        <form action="" method="post">
            <button type="submit" name="sair" class="btn_sair">Sair</button>
        </form>

        <nav class="usuario">
            <i class="bi bi-person-fill"></i>
            <p class="nome_usuario"><?php echo $_SESSION['nome'] ?></p>
            <i class="bi bi-caret-down-fill"></i>
        </nav>

    </ul>
</nav>

<?php

if (isset($_POST['sair'])) {
    session_destroy();
    header('Location: login/login.php');
}

?>