<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 9:07
 */

namespace App\Domain\Entity\StockEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\StockRepository\StockDoctrineRepository")
 */

class StockEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $clotheId;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sizeId;

    /**
     * @ORM\Column(type="integer", options={"default":0}))
     */
    private $stock;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param mixed $delete
     */
    public function setDelete($delete): void
    {
        $this->delete = $delete;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getClotheId()
    {
        return $this->clotheId;
    }

    /**
     * @param mixed $clotheId
     */
    public function setClotheId($clotheId)
    {
        $this->clotheId = $clotheId;
    }

    /**
     * @return mixed
     */
    public function getSizeId()
    {
        return $this->sizeId;
    }

    /**
     * @param mixed $sizeId
     */
    public function setSizeId($sizeId)
    {
        $this->sizeId = $sizeId;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
}