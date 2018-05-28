<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:31
 */

namespace App\Application\User\LogIn\DataTransforms;


use App\Application\User\LogIn\UserLogInDataTransform;

class UserLogInDataTransformJSON implements UserLogInDataTransform
{

    public function transform($token)
    {
        return $token;
    }
}