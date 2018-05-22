<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:50
 */

namespace App\Application\Gender\AllGenders\DataTransform;


use App\Application\Gender\AllGenders\GenderAllDataTransform;

class GenderAllDataTransformArray implements GenderAllDataTransform
{
    public function transform($data)
    {
        return $data;
    }
}