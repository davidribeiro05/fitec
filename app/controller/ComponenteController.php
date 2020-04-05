<?php

namespace App\Controller;

require_once '/wamp64/www/fitec/vendor/autoload.php';

// Responsavél pelo CRUD;
$componente = new \App\Classes\Produto\Componente();
$stmt = new \App\model\ComponenteDAO();

if (isset($_POST['salvarComponente'])) :
    $componente->setNome($_POST['nome']);
    $componente->setUnMedida($_POST['unMedida']);
    $componente->setGramatura($_POST['gramatura']);
    $componente->setNomeDescricao($_POST['nomeDescricao']);
    $componente->setLargura($_POST['largura']);
    $componente->setCorte($_POST['corte']);
    $componente->setIdBigBag($_POST['idBigBag']);
    if (!$stmt->inserir($componente)) :
        header("Location: \Fitec\App\View\listar.php");
    else :
        echo "Falha ao inserir registro";
    endif;
endif;
