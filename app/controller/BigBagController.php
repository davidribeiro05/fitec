<?php

namespace App\Controller;

require_once '/wamp64/www/fitec/vendor/autoload.php';

class BigBagController
{

    function inserir()
    {
        $bb = new \App\Classes\Produto\BigBag();
        $stmt = new \App\model\BigBagDAO();
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
    }

    function editar()
    {
        $bb = new \App\Classes\Produto\BigBag();
        $stmt = new \App\model\BigBagDAO();

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
    }

    function excluir()
    {
        $bb = new \App\Classes\Produto\BigBag();
        $stmt = new \App\model\BigBagDAO();
        $bb->setIdBigBag($_POST['excluir']);
        if (!$stmt->excluir($bb)) :
            header("Location: ../view/listar.php");
        else :

        endif;
    }
    
    public function validaPost()
    {
        if (isset($_POST["salvar"])) :
            $this->inserir();
        endif;
        if (isset($_POST["btnSalvarEdicao"])) :
            $this->editar();
        endif;
        if (isset($_REQUEST["btnExcluir"])) :
            $this->excluir();
        endif;
    }
    
    use Crud;
}
$bb = new BigBagController();
$bb->validateBag();

