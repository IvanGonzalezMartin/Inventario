<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:53
 */

namespace App\Application\Order\GetAll;


class OrderClotheGetAllCommand
{
    private $id;
    private $pages;
    private $orderPerPages;

    /**
     * OrderClotheGetAllCommand constructor.
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