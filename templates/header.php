<h1><a href="/">Episódio Zero</a></h1>

<nav>
    <ul>
        <li><a href="#">Menu</a></li>
        <li><a href="#">Sobre</a></li>
            <form action="" method="post">
                <button type="submit" name="sair" class="btn_sair">Sair</button>
            </form>
            <i class="bi bi-person-fill"></i>
    </ul>
</nav>

<?php

if(isset($_POST['sair'])){
    session_destroy();
    header('Location: login/login.php');
}

?>