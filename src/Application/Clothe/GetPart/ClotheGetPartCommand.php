<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:32
 */

namespace App\Application\Clothe\GetPart;


class ClotheGetPartCommand
{
    private $id;

    /**
     * ClotheGetPartCommand constructor.
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