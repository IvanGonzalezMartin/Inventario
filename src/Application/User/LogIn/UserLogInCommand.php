<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:28
 */

namespace App\Application\User\LogIn;


class UserLogInCommand
{
    private $anyThing;
    private $password;

    /**
     * UserLogInCommand constructor.
     * @param $anyThing
     * @param $password
     */
    public function __construct($anyThing, $password)
    {
        $this->anyThing = $anyThing;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function anyThing()
    {
        return $this->anyThing;
    }

    /**
     * @return mixed
     */
    public function password()
    {
        return $this->password;
    }




}