<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 8:25
 */

namespace App\Domain\Model\Role\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class RolNotFoundException extends DomainError
{
    const START_MESSAGE = 'Rol With ID: ';
    const END_MESSAGE = ' Not Found';
    private $roleID;

    public function __construct($roleID)
    {
        $this->roleID = $roleID;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->roleID . self::END_MESSAGE ;
    }
}