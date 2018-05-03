<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 12:53
 */

namespace App\Domain\Model\Department\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ParentDepartmentDoesntExistException extends DomainError
{
    const START_MESSAGE = 'Parent Department with ID: ';
    const END_MESSAGE = '  doesnt exist';
    private $parentID;

    public function __construct(int $parentID)
    {
        $this->parentID = $parentID;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->parentID . self::END_MESSAGE ;
    }
}