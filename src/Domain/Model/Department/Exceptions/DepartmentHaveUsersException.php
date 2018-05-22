<?php


namespace App\Domain\Model\Department\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class DepartmentHaveUsersException extends DomainError
{
    const START_MESSAGE = 'Cannot delete because we have users';

    public function __construct()
    {
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE;
    }
}