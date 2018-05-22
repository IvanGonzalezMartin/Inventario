<?php


namespace App\Domain\Model\ParentDepartment\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ParentDepartmentHaveDepartmentsException extends DomainError
{
    const START_MESSAGE = 'Cannot delete because we have departments';

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