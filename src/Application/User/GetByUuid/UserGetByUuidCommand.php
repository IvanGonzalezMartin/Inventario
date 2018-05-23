<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:36
 */

namespace App\Application\User\GetByUuid;


class UserGetByUuidCommand
{
    private $id;

    /**
     * UserGetByUuidCommand constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

}