<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:08
 */

namespace App\Application\Sizes;


class SizePartCommand
{
    private $name;

    /**
     * SizePartCommand constructor.
     * @param $nombre
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}