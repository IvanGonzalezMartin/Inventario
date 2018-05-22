<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:19
 */

namespace App\Domain\Services\SizeType;


use App\Domain\Model\SizeType\SizeType;

class SizeTypeAllService
{
    public function __invoke()
    {
        return SizeType::SIZE_TYPE;
    }
}