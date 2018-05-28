<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:15
 */

namespace App\Application\ClotheSizeStock\Update;


class ClotheSizeStockUpdateCommand
{
    private $id;
    private $stock;

    /**
     * ClotheSizeStockUpdateCommand constructor.
     * @param $id
     * @param $stock
     */
    public function __construct($id, $stock)
    {
        $this->id = $id;
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function stock()
    {
        return $this->stock;
    }
}