<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:08
 */

namespace App\Application\Sizes\PartOfSizes;


use App\Application\Sizes\SizePartDataTransform;

class SizeAllDataTransformArray implements SizePartDataTransform
{

    public function transform($data)
    {
        return $data;
    }
}