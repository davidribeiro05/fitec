<?php

namespace App\view;

require_once '/wamp64/www/fitec/vendor/autoload.php';

$bb = new \App\Controller\Produto\BigBag();
$stmt = new \App\model\BigBagDAO();
$bb->setIdBigBag($_POST['idBigBag']);

/*if (isset($_POST["btnSalvarEdicao"])) {
    $bb->setModelo($_POST['modelo']);
    $bb->setCliente($_POST['cliente']);
    $bb->setNumPedido($_POST['numPedido']);
    $bb->setNumFitec($_POST['numFitec']);
    $bb->setFatorSeguranca($_POST['fatorSeguranca']);
    $bb->setCapCarga($_POST['capCarga']);
    $bb->setCor($_POST['cor']);
    $bb->setImpressao($_POST['impressao']);
    $bb->setDimensao($_POST['dimensao']);
    $bb->setBoca($_POST['boca']);
    $bb->setFundo($_POST['fundo']);
    $bb->setLiner($_POST['liner']);
    $bb->setDescContentor($_POST['descContentor']);
    $bb->setIdBigBag($_POST['idBigBag']);
    if (!$stmt->editar($bb)) {
        header("Location: ./alertas/CadSucesso.php");
    } else {
        header("Location: ./alertas/CadErro.php");
    }
}
*/

foreach ($stmt->findByID($bb) as $dados) {}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <title>Editar</title>
</head>

<body class="bg-pagina">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!--<a class="navbar-brand" href="listar.php">Logo</a>-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Página Inicial <span class="sr-only">Página Inicial</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cadastroBag.php">Editar<span class="sr-only">Editar cadastro</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1 class="fonte-titulo text-center"><?php echo $dados['cliente'] ?></h1>
        <hr>
        <form method="POST" action="\App\Controller\Produto\BigBag">
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Modelo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Modelo</div>
                        </div>
                        <select class="custom-select col-md-10" name="modelo">
                            <option selected value="<?php echo $dados['modelo'] ?>"><?php echo $dados['modelo'] ?></option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="S4">S4</option>
                            <option value="S5">S5</option>
                            <option value="S6">S6</option>
                            <option value="S7">S7</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Cliente</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Cliente</div>
                        </div>
                        <input type="text" class="form-control" name="cliente" required value="<?php echo $dados['cliente'] ?>">
                    </div>
                </div>
                <div class="col-md-2 my-1">
                    <label class="sr-only">Nº Pedido</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Nº Pedido</div>
                        </div>
                        <input type="number" class="form-control" min="0" name="numPedido" required value="<?php echo $dados['numPedido'] ?>">
                    </div>
                </div>
                <div class="col-md-2 my-1">
                    <label class="sr-only">Nº Fitec</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Nº Fitec</div>
                        </div>
                        <input type="number" class="form-control" min="0" name="numFitec" required value="<?php echo $dados['numFitec'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Data Criação</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Elaborada em:</div>
                        </div>
                        <input type="date" class="form-control" name="dataCriacao" required value="<?php echo $dados['dataCriacao'] ?>">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Fator de segurança</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Fator de segurança</div>
                        </div>
                        <select class="custom-select col-md-8" name="fatorSeguranca" required>
                            <option selected value="<?php echo $dados['fatorSeguranca'] ?>"><?php echo $dados['fatorSeguranca'] ?></option>
                            <option value="05:01">05:01</option>
                            <option value="06:01">06:01</option>
                            <option value="07:01">07:01</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Capacidade de Carga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Capacidade de Carga:</div>
                        </div>
                        <input class="form-control" type="number" step="50" name="capCarga" min="0" required value="<?php echo $dados['capCarga'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 my-1">
                    <label class="sr-only">Cor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Cor:</div>
                        </div>
                        <input class="form-control" type="text" name="cor" required value="<?php echo $dados['cor'] ?>">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Impressão</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Impressão</div>
                        </div>
                        <select class="custom-select col-md-9" name="impressao" required>
                            <option selected value="<?php echo $dados['impressao'] ?>"><?php echo $dados['impressao'] ?></option>
                            <option value="F & V">Frente e verso</option>
                            <option value="Frente">Frente</option>
                            <option value="Sem impressão">Sem impressão</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5 my-1">
                    <label class="sr-only">Dimensão</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Dimensão:</div>
                        </div>
                        <input class="form-control" type="text" name="dimensao" required value="<?php echo $dados['dimensao'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 my-1">
                    <label class="sr-only">Boca</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Boca:</div>
                        </div>
                        <input class="form-control" type="text" name="boca" required value="<?php echo $dados['boca'] ?>">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Fundo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Fundo:</div>
                        </div>
                        <input class="form-control" type="text" name="fundo" required value="<?php echo $dados['fundo'] ?>">
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Liner</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Liner:</div>
                        </div>
                        <input class="form-control" type="text" name="liner" required value="<?php echo $dados['liner'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 my-1">
                    <label class="sr-only">Descrição do contentor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Descrição do Contentor:</div>
                        </div>
                        <input class="form-control" type="text" name="descContentor" required value="<?php echo $dados['descContentor'] ?>">
                    </div>
                </div>
            </div>
            <input class="form-control" type="hidden" name="idBigBag" value="<?php echo $dados['idBigBag'] ?>">
            <div class="form-row justify-content-end">
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-success" type="submit" name="btnSalvarEdicao">Salvar alteração</button>
                    <a href="listar.php" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>