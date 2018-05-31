<?php


namespace App\Domain\Model\Order\Exceptions;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class OrderAlreadyDeliveredException extends DomainError
{
    const START_MESSAGE = 'Order whit id: ';
    const END_MESSAGE = ' already delivered';
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
        parent::__construct();
    }

    function statusCode()
    {
        return MyOwnHttpCodes::HTTP_FOUND;
    }

    function statusMessage()
    {
        return self::START_MESSAGE . $this->id . self::END_MESSAGE ;
    }
}