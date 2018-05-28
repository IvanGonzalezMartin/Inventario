<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:49
 */

namespace App\Application\User\GetByUuid;


interface UserGetByUuidDataTransform
{
    public function transform($user);
}