<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 8:58
 */

namespace App\Application\User\Delete;


class UserDeleteCommand
{
    private $uuid;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid()
    {
        return $this->uuid;
    }
}