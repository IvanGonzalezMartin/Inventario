<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 14:04
 */

namespace App\Application\ParentDepartment\Delete;


class ParentDepartmentDeleteCommand
{
    private $id;

    /**
     * ParentDepartmentDeleteCommand constructor.
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