<?php

namespace App\model;

class UsuarioDAO
{
    public function inserir(\App\Controller\Funcionario\Usuario $u)
    {
        $query = "INSERT INTO usuario (nome, senha, departamento, criacao) 
        VALUES
        (?,?,?, CURRENT_DATE())";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $u->getIdUsuario(), \PDO::PARAM_STR);
        $stmt->bindValue(2, $u->getSenha(), \PDO::PARAM_STR);
        $stmt->bindValue(3, $u->getDepartamento(), \PDO::PARAM_STR);
        // $stmt->bindValue(4, $u->getCriacao());
    }
    public function validaLogin(\App\Controller\Funcionario\Usuario $u)
    {
        $query = "SELECT nome, senha from usuario WHERE nome = ? AND senha = ? ";
        $stmt = BancoDado::getConn()->prepare($query);
        $stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getSenha());
        $stmt->execute();
       
        
        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return false;
        endif;
    }
}
