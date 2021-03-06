<?php

namespace App\view;

include 'C:\wamp64\www\fitec\app\controller\SecaoLogin.php';
require_once '/wamp64/www/fitec/vendor/autoload.php';

$bb = new \App\Classes\Produto\BigBag();
$stmt = new \App\model\ComponenteDAO();
$stmtB = new \App\model\BigBagDAO();
$bb->setIdBigBag($_POST['idBigBag']);

$routerBigBag = new \App\Controller\Rotas();
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
                </ul>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link justify-content-end" href="<?php $routerBigBag->rIndex(); ?>"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <div class=" container">
        <h1 class="fonte-titulo text-center">Cadastro de Componentes</h1>
        <hr>
        <form action="<?php $routerBigBag->rComponente(); ?>" method="POST">
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
                        <input type="number" class="form-control" placeholder="Ex: 3.6" name="largura" min="0" step="0.01">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Corte</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Corte</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 1.38" name="corte" min="0" step="0.001">
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="pesoManual" name="pesoManual">
                <label class="form-check-label" for="pesoManual"><small>Não calcular peso automaticamente</small></label>
            </div>
            <p class="small">Somente preencher esses campos caso, opte por inserir peso manualmente</p>
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Consumo Kilo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Consumo Kilo</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 0,09" name="consumoKG" step="0.0001" max="2">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Consumo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Consumo</div>
                        </div>
                        <input type="number" class="form-control" placeholder="Ex: 0,09" name="consumo" step="0.0001" max="2">
                    </div>
                </div>
            </div>

            <input type="hidden" name="idComponente">
            <input type="hidden" name="idBigBag" value="<?php echo $dado['idBigBag']; ?>">

            <div class="form-row justify-content-end">
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-success animation" type="submit" name="salvarComponente"><i class="fas fa-save"></i></button>
                    <a href="<?= $routerBigBag->rView() ?>/listar.php" class="btn btn-outline-danger animation"><i class="fas fa-arrow-left"></i></a>
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