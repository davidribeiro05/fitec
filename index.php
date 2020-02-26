<?php

use App\Controller\Paginacao;
use App\model\BancoDado;

require '/wamp64/www/fitec/vendor/autoload.php';

//$bb = new \App\Controller\Produto\BigBag();
$stmt = new \App\model\BigBagDAO();

$p = new \App\Controller\Paginacao();
$p->setPagina((isset($_GET['pagina']))? $_GET['pagina'] : 1);

//echo $stmt->paginacao($p);