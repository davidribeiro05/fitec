<?php

namespace App\view;

include 'C:\wamp64\www\fitec\app\controller\SecaoLogin.php';
require_once '/wamp64/www/fitec/vendor/autoload.php';

$bb = new \App\Classes\Produto\BigBag();
$stmt = new \App\model\ComponenteDAO();
$stmtB = new \App\model\BigBagDAO();
$bb->setIdBigBag($_POST['idBigBag']);

$routerComponente = new \App\Controller\Rotas();
foreach ($stmtB->findByID($bb) as $dado) {
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <title>Cadastro de Componente</title>
</head>

<body class="bg-pagina">
    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark bg-dark">
            <!--<a class="navbar-brand" href="listar.php">Logo</a>-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="listar.php">Página Inicial <span class="sr-only">Página Inicial</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCad" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownCad">
                            <form action="<?= $routerComponente->rView(); ?>\CadastroComponente.php" method="post">
                                <input type="hidden" value="<?= $dados['idBigBag'] ?>" name="idBigBag">
                                <input class="dropdown-item" type="submit" name="btnCadastroComponente" value="Componente"></input>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link justify-content-end" href="<?php $routerComponente->rIndex(); ?>"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <div class=" container">
        <h1 class="fonte-titulo text-center">Cadastro de Componentes</h1>
        <hr>
        <form action="<?php $routerComponente->rComponente(); ?>" method="POST">
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Nome</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Nome</div>
                        </div>
                        <input type="text" class="form-control" placeholder="Ex: CORPO DO CONTENTOR" name="nome" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Un. Medida</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Un. Medida</div>
                        </div>
                        <input type="text" class="form-control" placeholder="Ex: M²" name="unMedida" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Gramatura</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Gramatura</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 0.60" name="gramatura" required min="0" step="0.01">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Descrição</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Descrição</div>
                        </div>
                        <input type="text" class="form-control" placeholder="Ex: Tecido Circ. 360 x 160 G" name="nomeDescricao" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Largura</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Largura</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 3.6" name="largura" min="0" step="0.1">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Corte</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Corte</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 1.38" name="corte" min="0" step="0.01">
                    </div>
                </div>
            </div>
            <input type="hidden" name="idComponente">
            <input type="number" name="idBigBag" value="<?php echo $dado['idBigBag']; ?>">

            <div class="form-row justify-content-end col-md-12">
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-success" type="submit" name="salvarComponente">Cadastrar</button>
                    <a href="\app\view\listar.php" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>