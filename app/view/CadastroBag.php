<?php
include 'C:\wamp64\www\fitec\app\controller\SecaoLogin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body class="bg-pagina">
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
                    <a class="nav-link justify-content-end" href="\index.php">Sair</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1 class="fonte-titulo text-center">Cadastro de Ficha Técnica</h1>
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
                            <option selected>Modelos</option>
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
                        <input type="text" class="form-control" placeholder="Ex: Alçatec" name="cliente" required>
                    </div>
                </div>
                <div class="col-md-2 my-1">
                    <label class="sr-only">Nº Pedido</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Nº Pedido</div>
                        </div>
                        <input type="number" class="form-control" placeholder="1" min="0" name="numPedido" required>
                    </div>
                </div>
                <div class="col-md-2 my-1">
                    <label class="sr-only">Nº Fitec</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Nº Fitec</div>
                        </div>
                        <input type="number" class="form-control" placeholder="1" min="0" name="numFitec" required>
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
                        <input type="date" class="form-control" placeholder="11/02/2020 14:15:53" name="dataCriacao" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Fator de segurança</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Fator de segurança</div>
                        </div>
                        <select class="custom-select col-md-8" name="fatorSeguranca" required>
                            <option selected>Lista</option>
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
                        <input class="form-control" type="number" step="50" placeholder="Ex: 1000" name="capCarga" min="0" required>
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
                        <input class="form-control" type="text" placeholder="Ex: Branco" name="cor" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Impressão</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Impressão</div>
                        </div>
                        <select class="custom-select col-md-9" name="impressao" required>
                            <option selected>Lista</option>
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
                        <input class="form-control" type="text" placeholder="Ex: 90 x 90 x 120" name="dimensao" required>
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
                        <input class="form-control" type="text" placeholder="Ex: Válv" name="boca" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Fundo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Fundo:</div>
                        </div>
                        <input class="form-control" type="text" placeholder="Ex: Saia" name="fundo" required>
                    </div>
                </div>
                <div class="col-md-4 my-1">
                    <label class="sr-only">Liner</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-label text-body">Liner:</div>
                        </div>
                        <input class="form-control" type="text" placeholder="Ex: C/Liner" name="liner" required>
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
                        <input class="form-control" type="text" placeholder="Ex: Cont. Flexível 90 x 90 x 120 160G Válv x Válv" name="descContentor" required>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-end">
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-success" type="submit" name="salvar">Cadastrar</button>
                    <a href="\app\view\listar.php" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>