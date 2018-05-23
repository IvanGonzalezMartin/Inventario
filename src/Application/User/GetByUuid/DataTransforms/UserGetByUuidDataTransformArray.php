<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:51
 */

namespace App\Application\User\GetByUuid\DataTransforms;


use App\Application\User\GetByUuid\UserGetByUuidDataTransform;

class UserGetByUuidDataTransformArray implements UserGetByUuidDataTransform
{

    public function transform($user)
    {
        $newUser = [];

        if (false === empty($user))
            $newUser = ['UUID' => $user->getId(), 'Name' => $user->getNameSurname()];

        return $newUser;
    }
}