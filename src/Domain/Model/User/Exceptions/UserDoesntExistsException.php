<?php


namespace App\Domain\Model\User\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class UserDoesntExistsException extends DomainError
{
    const START_MESSAGE = 'User with UUID: ';
    const END_MESSAGE = '  doesnt exist';
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_NOT_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->id . self::END_MESSAGE ;
    }
}