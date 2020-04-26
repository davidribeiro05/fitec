<?php

namespace App\model;

class BancoDado
{

    private static $instance;
    private static $host = "David";
    private static $usuario = "david";
    private static $senha = "d4v1d.3238";
    private static $banco = "fitec";

    public static function getConn()
    {
        try {
            if (!isset(self::$instance)) :
                self::$instance = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$banco, self::$usuario, self::$senha);
            endif;
            return self::$instance;
        } catch (\Exception $ex) {
            echo " {$ex->getMessage()} . <br>";
        }
    }
}
