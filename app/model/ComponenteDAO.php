<?php

namespace App\model;

class ComponenteDAO
{
    public function inserir(\App\Classes\Produto\Componente $c)
    {
        $queryIdComponente = "SELECT last_insert_id(idComponente) from componente order by idComponente desc";
        $queryA = "INSERT INTO componente (nome, unMedida, gramatura, fkBigBag) VALUES (?, ?, ?, ?)";
        $queryB = "INSERT INTO descricao (nome, fkComponente) VALUES (?, ?)";
        $queryC = "INSERT INTO medida (largura, corte, fkComponente) VALUES (? , ?, ?)";

        // Realiza o cadastro do componente
        $stmtA = BancoDado::getConn()->prepare($queryA);
        $stmtA->bindValue(1, $c->getNome(), \PDO::PARAM_STR);
        $stmtA->bindValue(2, $c->getUnMedida(), \PDO::PARAM_STR);
        $stmtA->bindValue(3, $c->getGramatura(), \PDO::PARAM_STR);
        $stmtA->bindValue(4, $c->getIdBigBag(), \PDO::PARAM_INT);

        if ($stmtA->execute() == true) :
            $stmtB = BancoDado::getConn()->query($queryIdComponente);
            $x = $stmtB->fetch();
            $c->setFkComponente($x[0]);

            // Realiza o cadastro da descrição
            $stmtC = BancoDado::getConn()->prepare($queryB);
            $stmtC->bindValue(1, $c->getNomeDescricao(), \PDO::PARAM_STR);
            $stmtC->bindValue(2, $c->getFkComponente(), \PDO::PARAM_INT);

            if ($stmtC->execute()) :
                // Realiza o cadastro das medidas
                $stmtD = BancoDado::getConn()->prepare($queryC);
                $stmtD->bindValue(1, $c->getLargura(), \PDO::PARAM_STR);
                $stmtD->bindValue(2, $c->getCorte(), \PDO::PARAM_STR);
                $stmtD->bindValue(3, $c->getFkComponente(), \PDO::PARAM_INT);
                if ($stmtD->execute() != true) :
                    $stmtD->errorCode();
                endif;
            else :
                $stmtC->errorCode();
            endif;
        else :
            print_r($stmtA->errorInfo());
        endif;
    }
}
