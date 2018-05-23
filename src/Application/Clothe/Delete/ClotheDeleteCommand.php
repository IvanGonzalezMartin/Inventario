<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 9:09
 */

namespace App\Application\Clothe\Delete;


class ClotheDeleteCommand
{
    private $id;

    /**
     * ClotheDeleteCommand constructor.
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