<?php


namespace App\Domain\Security\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class AccessDenied extends DomainError
{
    const MESSAGE = 'Access Denied because you dont have permision ';

    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FORBIDDEN;
    }

    function statusMessage()
    {
        return self::MESSAGE;
    }
}