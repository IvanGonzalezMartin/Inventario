<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:40
 */

namespace App\Application\ClotheSizeStock\GetPart;


class ClotheSizeStockGetPartCommand
{
    private $id;

    /**
     * ClotheSizeStockGetPartCommand constructor.
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