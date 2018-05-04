<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 8:16
 */

namespace App\Application\Manager\CheckEmail;


class ManagerCheckEmailCommand
{
    private $email;

    /**
     * ManagerCheckEmailCommand constructor.
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }

}