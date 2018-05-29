<?php


namespace App\Domain\Model\User\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class WrongPasswordException extends DomainError
{
    const MESSAGE = 'Password Wrong';


    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_I_AM_A_TEAPOT;
    }

    function statusMessage()
    {
        return self::MESSAGE;
    }
}