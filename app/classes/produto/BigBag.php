<?php

namespace App\Classes\Produto;

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
