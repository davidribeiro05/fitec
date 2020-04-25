<?php

namespace App\model;

class BigBagDAO
{

    public function inserir(\App\Classes\Produto\BigBag $b)
    {
        $query = "INSERT INTO bigbag (modelo, cliente, numPedido, numFitec, dataCriacao, fatorSeguranca, capCarga, cor, impressao, dimensao, boca, fundo, liner, descContentor) 
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getModelo(), \PDO::PARAM_STR);
        $stmt->bindValue(2, $b->getCliente(), \PDO::PARAM_STR);
        $stmt->bindValue(3, $b->getNumPedido(), \PDO::PARAM_INT);
        $stmt->bindValue(4, $b->getNumFitec(), \PDO::PARAM_INT);
        $stmt->bindValue(5, $b->getDataCriacao());
        $stmt->bindValue(6, $b->getFatorSeguranca(), \PDO::PARAM_STR);
        $stmt->bindValue(7, $b->getCapCarga(), \PDO::PARAM_INT);
        $stmt->bindValue(8, $b->getCor(), \PDO::PARAM_STR);
        $stmt->bindValue(9, $b->getImpressao(), \PDO::PARAM_STR);
        $stmt->bindValue(10, $b->getDimensao(), \PDO::PARAM_STR);
        $stmt->bindValue(11, $b->getBoca(), \PDO::PARAM_STR);
        $stmt->bindValue(12, $b->getFundo(), \PDO::PARAM_STR);
        $stmt->bindValue(13, $b->getLiner(), \PDO::PARAM_STR);
        $stmt->bindValue(14, $b->getDescContentor(), \PDO::PARAM_STR);
        $stmt->execute();
    }
    public function findALL()
    {
        $query = "SELECT * FROM bigbag";
        $stmt = BancoDado::getConn()->query($query);
        if ($stmt->rowCount() > 0) :
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else :
            return [];
        endif;
    }

    public function findByID(\App\Classes\Produto\BigBag $b)
    {
        $query = "SELECT * FROM bigbag where idBigBag = ?";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getIdBigBag(), \PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) :
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else :
            return [];
        endif;
    }

    function editar(\App\Classes\Produto\BigBag $b)
    {
        $query = "UPDATE bigbag SET modelo = ?, cliente = ?, numPedido = ?, numFitec = ?, 
            fatorSeguranca = ?, capCarga = ?, cor = ?, impressao = ?, dimensao = ?, 
            boca = ?, fundo = ?, liner = ?, descContentor = ? WHERE idBigBag = ? ";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getModelo());
        $stmt->bindValue(2, $b->getCliente());
        $stmt->bindValue(3, $b->getNumPedido());
        $stmt->bindValue(4, $b->getNumFitec());
        $stmt->bindValue(5, $b->getFatorSeguranca());
        $stmt->bindValue(6, $b->getCapCarga());
        $stmt->bindValue(7, $b->getCor());
        $stmt->bindValue(8, $b->getImpressao());
        $stmt->bindValue(9, $b->getDimensao());
        $stmt->bindValue(10, $b->getBoca());
        $stmt->bindValue(11, $b->getFundo());
        $stmt->bindValue(12, $b->getLiner());
        $stmt->bindValue(13, $b->getDescContentor());
        $stmt->bindValue(14, $b->getIdBigBag());

        $stmt->execute();
    }

    public function excluir(\App\Classes\Produto\BigBag $b)
    {
        $query = "DELETE FROM bigbag WHERE idBigBag = ?";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getIdBigBag());
        $stmt->execute();
    }

    public function paginacao(\App\Controller\Paginacao $p)
    {
        $qtd_pagina = 5;
        $total = "SELECT * FROM bigbag";
        $stmt = BancoDado::getConn()->query($total);
        $total_pg = $stmt->rowCount();
        $p->setNumPagina(ceil($total_pg / $qtd_pagina));

        $inicio = ($qtd_pagina * $p->getPagina() - $qtd_pagina);
        $resultado = "SELECT * FROM bigbag limit $inicio, $qtd_pagina";
        $query_pg = BancoDado::getConn()->query($resultado);

        //return $query_pg->rowCount();

        if ($query_pg->rowCount() > 0) :
            $dados = $query_pg->fetchAll(\PDO::FETCH_ASSOC);
            return $dados;
        else :
            return [];
        endif;
    }
}
