<?php

namespace App\model;
/*require_once 'BancoDado.php';
require_once 'BigBag.php';*/

class BigBagDAO
{

    public function inserir(\App\Controller\Produto\BigBag $b)
    {
        $query = "INSERT INTO bigbag (modelo, cliente, numPedido, numFitec, dataCriacao, fatorSeguranca, capCarga, cor, impressao, dimensao, boca, fundo, liner, descContentor) 
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getModelo());
        $stmt->bindValue(2, $b->getCliente());
        $stmt->bindValue(3, $b->getNumPedido());
        $stmt->bindValue(4, $b->getNumFitec());
        $stmt->bindValue(5, $b->getDataCriacao());
        $stmt->bindValue(6, $b->getFatorSeguranca());
        $stmt->bindValue(7, $b->getCapCarga());
        $stmt->bindValue(8, $b->getCor());
        $stmt->bindValue(9, $b->getImpressao());
        $stmt->bindValue(10, $b->getDimensao());
        $stmt->bindValue(11, $b->getBoca());
        $stmt->bindValue(12, $b->getFundo());
        $stmt->bindValue(13, $b->getLiner());
        $stmt->bindValue(14, $b->getDescContentor());
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
    public function findByID(\App\Controller\Produto\BigBag $b)
    {
        $query = "SELECT * FROM bigbag where idBigBag = ?";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $b->getIdBigBag());
        $stmt->execute();
        if ($stmt->rowCount() > 0) :
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else :
            return [];
        endif;
    }

    function editar(\App\Controller\Produto\BigBag $b)
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

    public function excluir(\App\Controller\Produto\BigBag $b)
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
