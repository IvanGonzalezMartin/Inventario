<?php


namespace App\Domain\Security\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class AccessDeniedNotAdminRole extends DomainError
{
    const MESSAGE = 'Access Denied because not Admin';

    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_UNAUTHORIZED;
    }

    function statusMessage()
    {
        return self::MESSAGE;
    }
}