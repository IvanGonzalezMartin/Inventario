<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:36
 */

namespace App\Application\Manager\GetPart;


class ManagerGetPartCommand
{
    private $id;

    /**
     * ManagerGetPartCommand constructor.
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