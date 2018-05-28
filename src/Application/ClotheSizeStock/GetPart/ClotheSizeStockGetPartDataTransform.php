<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:45
 */

namespace App\Application\ClotheSizeStock\GetPart;


interface ClotheSizeStockGetPartDataTransform
{
    public function transform($data);
}