<?php

namespace App\model;

class ComponenteDAO
{
    public function inserir(\App\Controller\Produto\Componente $c)
    {
        $queryA = "INSERT INTO componente (nome, unMedida, gramatura, fkBigBag) VALUES (?, ?, ?, ?)";
        $queryB = "INSERT INTO descricao (nome, fkComponente) VALUES (?, ?)";
        $stmtA = BancoDado::getConn()->prepare($queryA);
        $stmtA->bindValue(1, $c->getNome(), \PDO::PARAM_STR);
        $stmtA->bindValue(2, $c->getUnMedida(), \PDO::PARAM_STR);
        $stmtA->bindValue(3, $c->getGramatura(), \PDO::PARAM_STR);
        $stmtA->bindValue(4, $c->getIdBigBag(), \PDO::PARAM_INT);
        if ($stmtA->execute()) :
            $stmtB = BancoDado::getConn()->prepare($queryB);
            $stmtB->bindValue(1, $c->getNomeDescricao(), \PDO::PARAM_STR);
            $stmtB->bindValue(2, $c->getIdComponente(), \PDO::PARAM_INT);
            $stmtB->execute();
        endif;
    }
}
