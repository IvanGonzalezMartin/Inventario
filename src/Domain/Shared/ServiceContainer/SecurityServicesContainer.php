<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 10:10
 */

namespace App\Domain\Shared\ServiceContainer;


class SecurityServicesContainer
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

    public function add($name, $security)
    {
        $this->services[$name] = $security;
    }

    public function getService($name)
    {
        return $this->services[$name];
    }
}