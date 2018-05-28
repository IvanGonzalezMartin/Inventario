<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:54
 */

namespace App\Domain\Model\LogUser;


interface LogUserRepository
{
    public function logIn(LogUser $logUser);
    public function findByToken($token);
    public function findByUser($user);
}