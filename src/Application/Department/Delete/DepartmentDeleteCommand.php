<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 8:10
 */

namespace App\Application\Department\Delete;


class DepartmentDeleteCommand
{
    private $id;

    /**
     * DepartmentDeleteCommand constructor.
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