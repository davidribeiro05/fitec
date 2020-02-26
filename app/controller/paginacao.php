<?php

namespace App\Controller;

class Paginacao
{

    private $pagina;
    private $total;
    private $numPagina;

    public function getPagina()
    {
        return $this->pagina;
    }


    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getNumPagina()
    {
        return $this->numPagina;
    }
    public function setNumPagina($numPagina)
    {
        $this->numPagina = $numPagina;
    }
}
