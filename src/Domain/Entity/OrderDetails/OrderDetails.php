<?php

namespace App\Domain\Entity\OrderDetails;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\OrderEntityDoctrineRepository\OrderEntityDoctrineRepository")
 */
class OrderDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $clotheSizeStockID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $orderID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getClotheSizeStockID(): ?int
    {
        return $this->clotheSizeStockID;
    }

    public function setClotheSizeStockID(int $clotheSizeStockID): self
    {
        $this->clotheSizeStockID = $clotheSizeStockID;

        return $this;
    }

    public function getOrderID(): ?int
    {
        return $this->orderID;
    }

    public function setOrderID(int $orderID): self
    {
        $this->orderID = $orderID;

        return $this;
    }

    public function getDeleteID(): ?int
    {
        return $this->deleteID;
    }

    public function setDeleteID(?int $deleteID): self
    {
        $this->deleteID = $deleteID;

        return $this;
    }
}
