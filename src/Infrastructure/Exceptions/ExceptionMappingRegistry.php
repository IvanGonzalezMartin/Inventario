<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:36
 */

namespace App\Infrastructure\Exceptions;


class ExceptionMappingRegistry
{
    private $exceptions;

    public function __construct()
    {

    }

    public function addException($nameException, $value)
    {
        $this->exceptions[$nameException] = $value;
    }

    public function getStatusCode($nameException)
    {
        return $this->exceptions[$nameException];
    }
}