<?php

namespace App\Controller;

require_once '/wamp64/www/fitec/vendor/autoload.php';

class Rotas
{
    public function rLogin()
    {
        echo "\Fitec\App\Controller\Funcionario\Usuario.php";
    }
    
    public function rBigBag()
    {
        echo "\Fitec\App\Controller\BigBagController.php";
    }
    public function rComponente()
    {
        echo "\Fitec\App\Controller\ComponenteController.php";
    }
    public function rIndex()
    {
        echo "\Fitec\Index.php";
    }
    public function rController()
    {
        echo "\Fitec\App\Controller";
    }

    public function rView()
    {
        echo "\Fitec\App\View";
    }
 
}
