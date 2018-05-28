<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:20
 */

namespace App\Application\User\Filter\DataTransforms;


use App\Application\User\Filter\UserFilterDataTransform;

class UserFilterDataTransformArray implements UserFilterDataTransform
{

    public function transform($data)
    {
        $users = [];

        foreach ($data as $user) {
            $users [] = ['UUID' => $user->getId(), 'Name' => $user->getNameSurname()];
        }

        return $users;
    }
}