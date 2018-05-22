<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:35
 */

namespace App\Application\SizeType\AllSizeType\DataTransform;


use App\Application\SizeType\AllSizeType\SizeTypeAllDataTransform;

class SizeTypeAllDataTransformArray implements SizeTypeAllDataTransform
{
    public function transform($data)
    {
        return $data;
    }
}