<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 10:18
 */

namespace App\Application\Order\Create;


class OrderCreateCommand
{
    private $id;
    private $orders;

    /**
     * OrderCreateCommand constructor.
     * @param $id
     */
    public function __construct($id, $orders)
    {
        $this->id = $id;
        $this->orders = $orders;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    public function orders()
    {
        return $this->orders;
    }
}