<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:30
 */

namespace App\Application\User\LogIn;


interface UserLogInDataTransform
{
    public function transform($token);
}