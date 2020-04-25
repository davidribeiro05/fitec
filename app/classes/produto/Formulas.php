<?php

namespace App\Classes\Produto;

class Formulas extends Componente
{

    function consumoKilo(\App\Classes\Produto\Medida $m = null)
    {
        $calculoConsumo = ($m->getLargura() * $m->getCorte() * $m->getGramatura()) / 1000;
        return $calculoConsumo;
    }

    function consumo(\App\Classes\Produto\Medida $m = null)
    {
        $calculoConsumo = $m->getLargura() * $m->getCorte();
        return $calculoConsumo;
    }
}
