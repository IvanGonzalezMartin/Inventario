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
    private $pages;
    private $orderPerPages;

    /**
     * OrderClotheGetAllCommand constructor.
     * @param $id
     */
    public function __construct($pages, $orderPerPages)
    {
        if ($pages > 0)
            $this->pages = ( $pages -1 ) * $orderPerPages;

        $this->orderPerPages = $orderPerPages;
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