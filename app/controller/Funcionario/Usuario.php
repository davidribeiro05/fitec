<?php

namespace App\Controller\Funcionario;

session_start();

use App\model\UsuarioDAO;

require_once '/wamp64/www/fitec/vendor/autoload.php';

class Usuario
{
    private $idUsuario;
    private $nome;
    private $senha;
    private $departamento;
    private $criacao;
    private $modificacao;


    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }

    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    public function getCriacao()
    {
        return $this->criacao;
    }

    public function setCriacao($criacao)
    {
        $this->criacao = $criacao;

        return $this;
    }

    public function getModificacao()
    {
        return $this->modificacao;
    }

    public function setModificacao($modificacao)
    {
        $this->modificacao = $modificacao;
    }
}
$u = new Usuario;
$uDAO = new UsuarioDAO;

if (isset($_POST['btnLogin'])) :
    $u->setNome($_POST['usuario']);
    $u->setSenha($_POST['senha']);
    if ($uDAO->validaLogin($u) == true) :
        $_SESSION['usuario'] = true;
        header('Location: \App\view\listar.php');
    else:
        header('Location: \index.php');
    endif;
endif;
