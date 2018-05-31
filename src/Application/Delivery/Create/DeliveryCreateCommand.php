<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:44
 */

namespace App\Application\Delivery\Create;


class DeliveryCreateCommand
{
    private $orderID;
    private $managerID;
    private $docSing;

    /**
     * DeliveryCreateCommand constructor.
     * @param $orderID
     * @param $managerID
     */
    public function __construct($orderID, $managerID, $docSing)
    {
        $this->orderID = $orderID;
        $this->managerID = $managerID;
        $this->docSing = $docSing;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @return mixed
     */
    public function getManagerID()
    {
        return $this->managerID;
    }

    /**
     * @return mixed
     */
    public function getDocSing()
    {
        return $this->docSing;
    }
}