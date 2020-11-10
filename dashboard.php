<?php
require_once "acoes/conexao.php";
session_start();

if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])) {
    $nome = $_SESSION["usuario"][0];
    $adm = $_SESSION["usuario"][1];
} else {
    // REDIRECIONANDO VIA JAVASCRIPT
    echo "<script>window.location = '../Php-login-nivel-acesso/index.html'</script>";
}
?>

<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <meta charset="UTF-8">
    <title>DashBoard - <?= $nome; ?></title>
</head>

<body>

<header>
    <div id="content">
        <div id="user">
            <span>
                <?= $adm ? ($nome." (ADM)") : $nome; ?>
            </span>
        </div>
        <span class="logo">Sistema de acesso</span>
        <div id="logout">
            <button>Sair</button>
        </div>
    </div>
</header>

<?php if ($adm) : ?>
    <table width="40%">
        <thead>
        <tr>
            <td>Email</td>
            <td>Senha</td>
            <td>Nome</td>
            <td>ADM</td>
            <td>ID</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = $conexao->prepare("SELECT * FROM usuarios");
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        // for ($i = 0; $i < sizeof($users); $i++)
        foreach ($users as $user):
            ?>
            <tr>
                <td><?= $user['id_usuario'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['senha'] ?></td>
                <td><?= $user['nome'] ?></td>
                <td><?= $user['adm'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<a href="acoes/logout.php">Sair</a>

</body>

</html>