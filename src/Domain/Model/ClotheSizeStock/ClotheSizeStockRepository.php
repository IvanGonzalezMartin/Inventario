<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:49
 */

namespace App\Domain\Model\ClotheSizeStock;


interface ClotheSizeStockRepository
{
    /**
     * @param ClotheSizeStock $clotheSizeStock
     * @return mixed
     */
    public function insert(ClotheSizeStock $clotheSizeStock);

    /**
     * @return mixed
     */
    public function updateAll();
}