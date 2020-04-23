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

    public function findAll()
    {
        $query = "SELECT 
        c.idComponente idComponente,
        c.nome nome,
        c.unMedida unMedida,
        c.gramatura gramatura,
        d.nome descricao,
        m.largura largura,
        m.corte corte
    FROM
        bigbag bb
        INNER JOIN
        componente c ON c.fkBigBag = bb.idBigBag
            INNER JOIN
        descricao d ON  d.fkComponente = c.idComponente
            INNER JOIN
        medida m ON m.fkComponente =  c.idComponente";

        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) :
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else :
            return [];
        endif;
    }

    public function findById(\App\Classes\Produto\Componente $c)
    {
        $query = "SELECT 
        c.idComponente idComponente,
        c.nome nome,
        c.unMedida unMedida,
        c.gramatura gramatura,
        d.nome descricao,
        m.largura largura,
        m.corte corte
    FROM
        bigbag bb
        INNER JOIN
        componente c ON c.fkBigBag = bb.idBigBag
            INNER JOIN
        descricao d ON  d.fkComponente = c.idComponente
            INNER JOIN
        medida m ON m.fkComponente =  c.idComponente
        WHERE idBigBag = ?";

        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $c->getIdBigBag(), \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) :
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else :
            return [];
        endif;
    }

    public function editar(\App\Classes\Produto\Componente $c)
    {
        $queryA = "UPDATE componente SET nome = ? , unMedida = ? , gramatura = ? where idComponente = ?";
        $queryB = "UPDATE descricao SET nome = ? WHERE idDescricao = ?";
        $queryC = "UPDATE medida SET largura = ? , corte = ? WHERE idMedida = ?";

        $stmt = BancoDado::getConn()->prepare($queryA);
        $stmt->bindValue(1, $c->getNome(), \PDO::PARAM_STR);
        $stmt->bindValue(2, $c->getUnMedida(), \PDO::PARAM_STR);
        $stmt->bindValue(3, $c->getGramatura(), \PDO::PARAM_STR);
        $stmt->bindValue(4, $c->getIdComponente(), \PDO::PARAM_INT);
        if ($stmt->execute()) :
            $stmtB = BancoDado::getConn()->prepare($queryB);
            $stmtB->bindValue(1, $c->getNomeDescricao(), \PDO::PARAM_STR);
            $stmtB->bindValue(2, $c->getIdDescricao(), \PDO::PARAM_INT);
            if ($stmtB->execute() == true) :
                $stmtC = BancoDado::getConn()->prepare($queryC);
                $stmtC->bindValue(1, $c->getLargura(), \PDO::PARAM_STR);
                $stmtC->bindValue(2, $c->getCorte(), \PDO::PARAM_STR);
                $stmtC->bindValue(3, $c->getIdMedida(), \PDO::PARAM_INT);
                $stmtC->execute();
            endif;
        else :
            $stmt->errorCode();
        endif;
    }

    public function excluir(\App\Classes\Produto\Componente $c)
    {
        $query = "DELETE FROM componente WHERE idComponente = ?";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $c->getIdComponente(), \PDO::PARAM_INT);
        $stmt->execute();
    }
}
