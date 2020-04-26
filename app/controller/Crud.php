<?php

namespace App\Controller;

trait Crud 
{
    public function validateBag()
    {
        $bb = new BigBagController();
        $bb->validaPost();
        
      
    }
    public function validateComponente(){
        $cc = new ComponenteController();
        $cc->validaPost();
    }
}
