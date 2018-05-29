<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:29
 */

namespace App\Application\User\LogOut;


class UserLogOutCommand
{
    private $token;

    /**
     * UserLogOutCommand constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}