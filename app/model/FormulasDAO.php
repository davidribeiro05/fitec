<?php

namespace App\model;

class FormulasDAO
{
    public function inserir(\App\Classes\Produto\Formulas $f)
    {
        $query = "INSERT INTO peso (consumo, consumoKG, fkBigBag) VALUES (?, ? , ?)";
        $stmt = BancoDado::getConn()->prepare($query);
        $f->consumoKilo();
        $f->consumo();
        $stmt->bindValue(1, $f->consumoKilo(), \PDO::PARAM_STR);
        $stmt->bindValue(2, $f->consumo(), \PDO::PARAM_STR);
        $stmt->bindValue(3, $f->getFkComponente(), \PDO::PARAM_INT);
        $stmt->execute();
    }
}
