<?php

namespace App\Controller;

require_once '/wamp64/www/fitec/vendor/autoload.php';

// Responsavél pelo CRUD;
$componente = new \App\Classes\Produto\Componente();
$formula = new \App\Classes\Produto\Formulas();
$stmt = new \App\model\ComponenteDAO();

// Cadastrar Componente
if (isset($_POST['pesoManual']) == "on") :
    if (isset($_POST['salvarComponente'])) :
        $componente->setNome($_POST['nome']);
        $componente->setUnMedida($_POST['unMedida']);
        $componente->setGramatura($_POST['gramatura']);
        $componente->setNomeDescricao($_POST['nomeDescricao']);
        $componente->setLargura($_POST['largura']);
        $componente->setCorte($_POST['corte']);
        $componente->setIdBigBag($_POST['idBigBag']);
        $componente->setConsumoKG($_POST['consumoKG']);
        $componente->setConsumo($_POST['consumo']);
        if (!$stmt->inserirManual($componente)) :
            header("Location: \Fitec\App\View\listar.php");
        else :
            echo "Falha ao inserir registro";
        endif;
    endif;

else :
    if (isset($_POST['salvarComponente'])) :
        $componente->setNome($_POST['nome']);
        $componente->setUnMedida($_POST['unMedida']);
        $componente->setGramatura($_POST['gramatura']);
        $componente->setNomeDescricao($_POST['nomeDescricao']);
        $componente->setLargura($_POST['largura']);
        $componente->setCorte($_POST['corte']);
        $componente->setIdBigBag($_POST['idBigBag']);
        $formula->setGramatura($_POST['gramatura']);
        $formula->setLargura($_POST['largura']);
        $formula->setCorte($_POST['corte']);
        if (!$stmt->inserir($componente, $formula)) :
            header("Location: \Fitec\App\View\listar.php");
        else :
            echo "Falha ao inserir registro";
        endif;
    endif;
endif;



// Editar Componente
if (isset($_POST['editarComponente'])) :
    $componente->setNome($_POST['nome']);
    $componente->setUnMedida($_POST['unMedida']);
    $componente->setGramatura($_POST['gramatura']);
    $componente->setNomeDescricao($_POST['nomeDescricao']);
    $componente->setLargura($_POST['largura']);
    $componente->setCorte($_POST['corte']);
    $componente->setIdBigBag($_POST['idBigBag']);
    $formula->setGramatura($_POST['gramatura']);
    $formula->setLargura($_POST['largura']);
    $formula->setCorte($_POST['corte']);
    if (!$stmt->inserir($componente, $formula)) :
        header("Location: \Fitec\App\View\listar.php");
    else :
        echo "Falha ao inserir registro";
    endif;
endif;
