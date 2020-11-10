<?php
require_once "conexao.php";

if (isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null) {
    $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $query->execute(array($_POST["email"], $_POST["senha"]));

    if ($query->rowCount() != 0) {
        $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        session_start();
        $_SESSION["usuario"] = array($user['nome'], $user['adm']);
        // REDIRECIONANDO VIA JAVASCRIPT
        //echo "<script>window.location = '../dashboard.php'</script>";
        echo json_encode(array("erro"=> 0));

    } else {
        // REDIRECIONANDO VIA JAVASCRIPT
        //echo "<script>window.location = '../index.html'</script>";
        echo json_encode(array("erro"=> 1, "mensagem" => "Email e/ou senha incorretos"));
    }

} else {
    // REDIRECIONANDO VIA JAVASCRIPT
    //echo "<script>window.location = '../Php-login-nivel-acesso/index.html'</script>";
    echo json_encode(array("erro"=> 1, "mensagem" => "Ocorreu um erro interno no servidor."));
}

?>