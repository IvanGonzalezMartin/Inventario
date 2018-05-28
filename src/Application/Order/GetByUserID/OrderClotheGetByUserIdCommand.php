<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 11:38
 */

namespace App\Application\Order\GetByUserID;


class OrderClotheGetByUserIdCommand
{
    private $id;
    private $pages;
    private $orderPerPages;

    /**
     * OrderClotheGetAllCommand constructor.
     * @param $id
     */
    public function __construct($id, $pages, $orderPerPages)
    {
        $this->id = $id;

        if ($pages > 0)
            $this->pages = ( $pages -1 ) * $orderPerPages;

        $this->orderPerPages = $orderPerPages;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return float|int
     */
    public function pages()
    {
        return $this->pages;
    }

    /**
     * @return mixed
     */
    public function oderPerPages()
    {
        return $this->orderPerPages;
    }
}