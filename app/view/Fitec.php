<?php

namespace App\view;

include 'C:\wamp64\www\fitec\app\controller\SecaoLogin.php';

require_once '/wamp64/www/fitec/vendor/autoload.php';

$componente = new \App\Classes\Produto\Componente();
$stmt = new \App\model\ComponenteDAO();
$routerBigBag = new \App\Controller\Rotas();
$componente->setIdBigBag($_POST['idBigBag']);
foreach ($stmt->findById($componente) as $dado) {
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
    <title>FITEC</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark bg-dark">
            <!--<a class="navbar-brand" href="listar.php">Logo</a>-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Página Inicial <span class="sr-only">Página Inicial</span></a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCad" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownCad">
                            <a class="dropdown-item active" href="cadastroBag.php">Contentor</a>
                            <a class="dropdown-item " href="cadastroComponente.php">Componentes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
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
    <div class="container">
        <h1 class="fonte-titulo text-center"><?= $dado['cliente'] ?></h1>
        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">COMPONENTE</th>
                    <th scope="col">Largura</th>
                    <th scope="col">x</th>
                    <th scope="col">Corte</th>
                    <th scope="col">Con. KG</th>
                    <th scope="col">Consumo</th>
                    <th scope="col">UN</th>
                    <th scope="col">Descrição</th>

                </tr>
            </thead>
            <tbody class="bg-light">
                <?php foreach ($stmt->findById($componente) as $dado) { ?>
                    <tr>
                        <td scope="row"><?= $dado['nome']; ?></td>
                        <td scope="row"><?= $dado['largura']; ?></td>
                        <td scope="row">x</td>
                        <td scope="row"><?= $dado['corte']; ?></td>
                        <td scope="row"><?= number_format($dado['consumoKG'], 4); ?></td>
                        <td scope="row"><?= number_format($dado['consumo'], 4); ?></td>
                        <td scope="row"><?= $dado['unMedida']; ?></td>
                        <td scope="row"><?= $dado['descricao']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>