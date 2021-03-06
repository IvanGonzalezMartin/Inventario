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

class UserNickNameAlreadyExistsException extends DomainError
{
    const START_MESSAGE = 'NickName: ';
    const END_MESSAGE = ' All Ready Exists';
    private $nickName;

    public function __construct($nickName)
    {
        $this->nickName = $nickName;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_CONFLICT;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->nickName . self::END_MESSAGE ;
    }
}