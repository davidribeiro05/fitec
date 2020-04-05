<?php

namespace App\Classes\Produto;

use App\model\ComponenteDAO;
use App\Classes\Produto\BigBag;

require_once '/wamp64/www/fitec/vendor/autoload.php';

class Componente extends BigBag
{
    private $idComponente;
    private $nome;
    private $unMedida;
    private $gramatura;
    private $fkBigBag;
    private $idDescricao;
    private $nomeDescricao;
    private $fkComponente;
    private $largura;
    private $corte;

    public function getIdComponente()
    {
        return $this->idComponente;
    }

    public function setIdComponente($idComponente)
    {
        $this->idComponente = $idComponente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getUnMedida()
    {
        return $this->unMedida;
    }

    public function setUnMedida($unMedida)
    {
        $this->unMedida = $unMedida;
    }

    public function getGramatura()
    {
        return $this->gramatura;
    }

    public function setGramatura($gramatura)
    {
        $this->gramatura = $gramatura;
    }
    public function getFkBigBag()
    {
        return $this->fkBigBag;
    }
    public function setFkBigBag($fkBigBag)
    {
        $this->fkBigBag = $fkBigBag;
    }
    public function getIdDescricao()
    {
        return $this->idDescricao;
    }
    public function setIdDescricao($idDescricao)
    {
        $this->idDescricao = $idDescricao;
    }
    public function getFkComponente()
    {
        return $this->fkComponente;
    }
    public function setFkComponente($fkComponente)
    {
        $this->fkComponente = $fkComponente;
    }
    public function getNomeDescricao()
    {
        return $this->nomeDescricao;
    }
    public function setNomeDescricao($nomeDescricao)
    {
        $this->nomeDescricao = $nomeDescricao;
    }

    public function getLargura()
    {
        return $this->largura;
    }


    public function setLargura($largura)
    {
        $this->largura = $largura;
    }
    public function getCorte()
    {
        return $this->corte;
    }


    public function setCorte($corte)
    {
        $this->corte = $corte;
    }
}
