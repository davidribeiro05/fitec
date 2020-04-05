<?php

namespace App\Controller;

require_once '/wamp64/www/fitec/vendor/autoload.php';

$bb = new \App\Classes\Produto\BigBag();
$stmt = new \App\model\BigBagDAO();
$bbRouter = new \App\Controller\Rotas();
// Operação de inserção
if (isset($_POST["salvar"])) :
    $bb->setModelo($_POST['modelo']);
    $bb->setCliente($_POST['cliente']);
    $bb->setNumPedido($_POST['numPedido']);
    $bb->setNumFitec($_POST['numFitec']);
    $bb->setDataCriacao($_POST['dataCriacao']);
    $bb->setFatorSeguranca($_POST['fatorSeguranca']);
    $bb->setCapCarga($_POST['capCarga']);
    $bb->setCor($_POST['cor']);
    $bb->setImpressao($_POST['impressao']);
    $bb->setDimensao($_POST['dimensao']);
    $bb->setBoca($_POST['boca']);
    $bb->setFundo($_POST['fundo']);
    $bb->setLiner($_POST['liner']);
    $bb->setDescContentor($_POST['descContentor']);
    if (!$stmt->inserir($bb)) :
        header("Location: ../View/Alertas/CadSucesso.php");
    else :
        header("Location: ./alertas/CadErro.php");
    endif;
endif;

// Operação de exclusão
if (isset($_REQUEST["btnExcluir"])) :
    $bb->setIdBigBag($_POST['excluir']);
    if (!$stmt->excluir($bb)) :
        header("Location: ../view/listar.php");
    else :

    endif;

endif;

// Operação de edição
if (isset($_POST["btnSalvarEdicao"])) :
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
    if (!$stmt->editar($bb)) :
        header("Location: ../View/listar.php");
    else :
        header("Location: ./alertas/CadErro.php");
    endif;
endif;
