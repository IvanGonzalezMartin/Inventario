<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 12:01
 */

namespace App\Domain\Model\ClotheSizeStock\Exceptions;

use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;

class ClotheSizeStockWithIdDoesntExistsException extends DomainError
{
    const START_MESSAGE = 'ClotheSizeStock with id: ';
    const END_MESSAGE = ' doesnt exists';
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
        return self::START_MESSAGE . $this->id . self::END_MESSAGE;
    }
}