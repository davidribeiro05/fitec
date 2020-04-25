<?php

namespace App\view;

include 'C:\wamp64\www\fitec\app\controller\SecaoLogin.php';

require_once '/wamp64/www/fitec/vendor/autoload.php';

$bb = new \App\Classes\Produto\BigBag();
$stmt = new \App\model\BigBagDAO();
$p = new \App\Controller\Paginacao();
$p->setPagina((isset($_REQUEST['pagina'])) ? $_REQUEST['pagina'] : 1);
$routerBigBag = new \App\Controller\Rotas();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

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
                            <a class="dropdown-item" href="cadastroBag.php">Contentor</a>
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
        <h1 class="fonte-titulo text-center">Controle de Ficha Técnica</h1>
        <hr>
    </div>
    <div class="container">
        <form class="form-row">
            <div class="form-group col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            Pesquisar por:
                        </div>
                    </div>
                    <select name="" id="" class="form-control custom-select">
                        <option value="">Cliente</option>
                        <option value="">Modelo</option>
                        <option value="">Descrição</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-7">
                <input class="form-control" type="text" placeholder="Digite aqui o que procura" aria-label="Search">
            </div>
            <div class="form-group col-md-1 col-sm-12">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
            </div>
        </form>
        <hr>

        <table class="table responsive table-dark table-striped fonte-texto">
            <thead>
                <tr>
                    <td>Cliente</td>
                    <td>Modelo</td>
                    <td>Data de criação</td>
                    <td colspan="3" style="text-align: center;">Ações</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($stmt->paginacao($p) as $dado) { ?>
                        <td><?php echo $dado['cliente'] ?></td>
                        <td><?php echo $dado['descContentor'] ?></td>
                        <td><?php echo $dado['dataCriacao'] ?></td>
                        <td colspan="1">
                            <form action="visualizarCadastro.php" method="POST">
                                <input type="hidden" value="<?php echo $dado['idBigBag'] ?>" name="idBigBag">
                                <button class="btn bg-label btn-sm" type="submit"><i class="fas fa-external-link-alt"></i></button>
                            </form>
                        </td>

                        <td>
                            <form action="visualizarCadastro.php" method="POST">
                                <input type="hidden" value="<?php echo $dado['idBigBag'] ?>" name="idBigBag">
                                <button class="btn bg-label btn-sm" type="submit"><i class="fas fa-table"></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="<?php $routerBigBag->rBigBag(); ?>">
                                <input type="hidden" value="<?php echo $dado['idBigBag'] ?>" name="excluir">
                                <a href="" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                                    <button class="btn bg-label btn-sm" type="submit" name="btnExcluir">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>
                            </form>
                        </td>
                </tr> <?php } ?>
            </tbody>
        </table>
        <nav aria-label="...">
            <ul class="pagination pagination-sm justify-content-end">
                <?php
                for ($i = 1; $i < $p->getNumPagina() + 1; $i++) {
                ?>
                    <?php if ($i == $p->getPagina()) : $active = "active"; ?>
                        <li class="page-item <?php echo $active ?>">
                        <?php endif; ?>
                        <a class="page-link" href="listar.php?pagina=<?php echo $i; ?>"><?php echo $i ?></a>
                        </li>
                    <?php } ?>
        </nav>
    </div>

    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>