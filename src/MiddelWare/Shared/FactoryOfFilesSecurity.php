<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 8:57
 */

namespace App\MiddelWare\Shared;


class FactoryOfFilesSecurity
{
    private static $instance;
    private $securities;


    private function __construct()
    {
        $this->securities = [];
    }

    public static function getInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add($name, $security)
    {
        $this->securities[$name] = $security;
    }

    public function getSecurity($name)
    {
        return $this->securities[$name];
    }
}