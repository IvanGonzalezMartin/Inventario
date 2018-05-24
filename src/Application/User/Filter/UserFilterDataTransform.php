<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:18
 */

namespace App\Application\User\Filter;


interface UserFilterDataTransform
{
    public function transform($data);
}