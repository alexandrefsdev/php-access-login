<?php

define('DB_HOST', "localhost\SQLEXPRESS");
define('DB_USER', "sa");
define('DB_PASSWORD', "123456789");
define('DB_NAME', "php_login_acesso");
define('DB_DRIVER', "sqlsrv");

$pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
$pdoConfig .= "Database=" . DB_NAME . ";";


try {
    $conexao = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {
    //echo "Ocorreu um erro de conexão: {$erro->getMessage()}";
    $conexao = null;
}

