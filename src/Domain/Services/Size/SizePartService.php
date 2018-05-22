<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:17
 */

namespace App\Domain\Services\Size;

use App\Domain\Model\Sizes\Sizes;
use App\Domain\Model\SizeType\Exceptions\SizeTypeDosentExistException;

class SizePartService
{
    public function __invoke($nombre)
    {
        if (empty(Sizes::GET_ARRAY_SIZE[$nombre]))
            throw new SizeTypeDosentExistException($nombre);

        return Sizes::GET_ARRAY_SIZE[$nombre];
    }
}