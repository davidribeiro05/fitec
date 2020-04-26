<?php

namespace App\Classes\Produto;

class Formulas extends Componente
{

    function consumoKilo()
    {
        $calculoConsumo = ($this->getLargura() * $this->getCorte() * $this->getGramatura()) / 1000;
        return $calculoConsumo;
    }

    function consumo()
    {
        $calculoConsumo = $this->getLargura() * $this->getCorte();
        return $calculoConsumo;
    }
    
}
