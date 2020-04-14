<?php
session_start();
session_destroy();

require '/wamp64/www/fitec/vendor/autoload.php';

use App\Controller\Rotas;

$u =  new Rotas();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/fitec/app/view/css/login.css">
    <link rel="stylesheet" href="/fitec/app/view/css/bootstrap.css">
    <link rel="stylesheet" href="/fitec/app/view/css/personalizado.css">
    <title>Login</title>
</head>

<body class="text-center bg-pagina">
    <form class="form-signin" method="POST" action="<?php $u->rLogin(); ?>">
        <?php if (isset($_SESSION['erroUsuario'])) :
            echo $_SESSION['erroUsuario'];
        endif;
        ?>
        <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Bem vindo, por favor realize o login!</h1>
        <label for="usuario" class="sr-only">Usuário</label>
        <input type="text" name="usuario" class="form-control" placeholder="Digite aqui seu usuário" required autofocus>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite aqui sua senha" required>
        <button class="btn btn-lg bg-label btn-block" type="submit" name="btnLogin">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>

    </form>

</body>

<script src="app/view/js/all.min.js"></script>

</html>