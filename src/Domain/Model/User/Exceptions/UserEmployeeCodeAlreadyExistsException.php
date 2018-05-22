<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 12:01
 */

namespace App\Domain\Model\User\Exceptions;

use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class UserEmployeeCodeAlreadyExistsException extends DomainError
{
    const START_MESSAGE = 'EmployeeCode: ';
    const END_MESSAGE = ' All Ready Exists';

    private $employeeCode;

    public function __construct($employeeCode)
    {
        $this->employeeCode = $employeeCode;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_CONFLICT;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->employeeCode . self::END_MESSAGE ;
    }
}