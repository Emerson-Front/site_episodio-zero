<?php


Config::MySql();

class MySql
{

    private static $pdo;

    public static function conectar()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "<h3 class='Erro_conexao'>Erro ao se conectar: " . $e->getMessage() . "</h3>";
            }
        }

        return self::$pdo;
    }

}
?>

<style>
    .Erro_conexao {
        color: blue;
        text-align: center;
        margin: 20px 0;
    }
</style>