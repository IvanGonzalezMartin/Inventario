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

class UserNifAlreadyExistsException extends DomainError
{
    const START_MESSAGE = 'Nif: ';
    const END_MESSAGE = ' All Ready Exists';

    private $email;

    public function __construct($email)
    {
        $this->email = $email;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_CONFLICT;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->email . self::END_MESSAGE ;
    }
}