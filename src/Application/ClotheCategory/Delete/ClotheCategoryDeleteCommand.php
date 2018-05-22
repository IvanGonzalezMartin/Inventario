<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:50
 */

namespace App\Application\ClotheCategory\Delete;


class ClotheCategoryDeleteCommand
{
    private $id;

    /**
     * ClotheCategoryDeleteCommand constructor.
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