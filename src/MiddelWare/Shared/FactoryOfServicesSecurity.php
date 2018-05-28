<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 8:57
 */

namespace App\MiddelWare\Shared;


class FactoryOfServicesSecurity
{
    private static $instance;
    private $services;


    private function __construct()
    {
        $this->services = [];
    }

    public static function getInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add($name, $service)
    {
        $this->services[$name] = $service;
    }

    public function getService($name)
    {
        return $this->services[$name];
    }
}