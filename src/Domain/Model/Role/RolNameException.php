<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:46
 */

namespace App\Domain\Model\Role;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class RolNameException extends DomainError
{
    const START_MESSAGE = 'Role name must have more than ';
    const END_MESSAGE = ' letters';
    private $maxLength;
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_LENGTH_REQUIRED;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->maxLength . self::END_MESSAGE ;
    }
}