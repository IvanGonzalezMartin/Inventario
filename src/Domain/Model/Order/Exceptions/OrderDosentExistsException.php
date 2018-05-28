<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:59
 */

namespace App\Domain\Model\Order\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class OrderDosentExistsException extends DomainError
{

    const START_MESSAGE = 'Order whit ID: ';
    const END_MESSAGE = ' dosent exist';
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_CONFLICT;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->id . self::END_MESSAGE ;
    }
}