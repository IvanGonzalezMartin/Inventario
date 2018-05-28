<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:38
 */

namespace App\Application\OrderDetails\GetByOrderID;


class OrderDetailsGetByOrderIdCommand
{
    private $id;

    /**
     * OrderDetailsGetByOrderIdCommand constructor.
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