<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 11:26
 */

namespace App\Domain\Entity\OrderDetailsEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\OrderDetailsRepository\OrderDetailsDoctrineRepository")
 */
class OrderDetailsEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $sizeId;

    /**
     * @ORM\Column(type="integer")
     */
    private $clotheSizeStockId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

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
    public function getSizeId()
    {
        return $this->sizeId;
    }

    /**
     * @param mixed $sizeId
     */
    public function setSizeId($sizeId): void
    {
        $this->sizeId = $sizeId;
    }

    /**
     * @return mixed
     */
    public function getClotheSizeStockId()
    {
        return $this->clotheSizeStockId;
    }

    /**
     * @param mixed $clotheSizeStockId
     */
    public function setClotheSizeStockId($clotheSizeStockId): void
    {
        $this->clotheSizeStockId = $clotheSizeStockId;
    }

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


}