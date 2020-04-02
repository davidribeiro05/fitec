<?php

namespace App\Controller\Produto;

require_once '/wamp64/www/fitec/vendor/autoload.php';

class BigBag
{
    private $idBigBag;
    private $modelo;
    private $cliente;
    private $numPedido;
    private $numFitec;
    private $dataCriacao;
    private $fatorSeguranca;
    private $capCarga;
    private $cor;
    private $impressao;
    private $dimensao;
    private $boca;
    private $fundo;
    private $liner;
    private $descContentor;


    public function getIdBigBag()
    {
        return $this->idBigBag;
    }

    public function setIdBigBag($idBigBag)
    {
        $this->idBigBag = $idBigBag;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }
    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($numPedido)
    {
        $this->numPedido = $numPedido;
    }

    public function getNumFitec()
    {
        return $this->numFitec;
    }

    public function setNumFitec($numFitec)
    {
        $this->numFitec = $numFitec;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }
    public function getFatorSeguranca()
    {
        return $this->fatorSeguranca;
    }

    public function setFatorSeguranca($fatorSeguranca)
    {
        $this->fatorSeguranca = $fatorSeguranca;
    }

    public function getCapCarga()
    {
        return $this->capCarga;
    }

    public function setCapCarga($capCarga)
    {
        $this->capCarga = $capCarga;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    public function getImpressao()
    {
        return $this->impressao;
    }

    public function setImpressao($impressao)
    {
        $this->impressao = $impressao;
    }

    public function getDimensao()
    {
        return $this->dimensao;
    }

    public function setDimensao($dimensao)
    {
        $this->dimensao = $dimensao;
    }

    public function getBoca()
    {
        return $this->boca;
    }

    public function setBoca($boca)
    {
        $this->boca = $boca;
    }

    public function getFundo()
    {
        return $this->fundo;
    }

    public function setFundo($fundo)
    {
        $this->fundo = $fundo;
    }

    public function getLiner()
    {
        return $this->liner;
    }

    public function setLiner($liner)
    {
        $this->liner = $liner;
    }

    public function getDescContentor()
    {
        return $this->descContentor;
    }

    public function setDescContentor($descContentor)
    {
        $this->descContentor = $descContentor;
    }
}

$bb = new BigBag();
$stmt = new \App\model\BigBagDAO();
// Operação de inserção
if (isset($_POST["salvar"])) {
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
    if (!$stmt->inserir($bb)) {
        header("Location: ./alertas/CadSucesso.php");
    } else {
        header("Location: ./alertas/CadErro.php");
    }
}

// Operação de exclusão
if (isset($_REQUEST["btnExcluir"])) :
    $bb->setIdBigBag($_POST['excluir']);
    if (!$stmt->excluir($bb)) :
        header("Location: /app/view/listar.php");
    else :

    endif;

endif;

// Operação de edição
if (isset($_POST["btnSalvarEdicao"])) {
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
