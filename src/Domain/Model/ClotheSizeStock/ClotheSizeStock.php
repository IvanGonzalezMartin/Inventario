<?php

namespace App\Domain\Model\ClotheSizeStock;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClotheSizeStockDoctrineRepository\ClotheSizeStockDoctrineRepository")
 */
class ClotheSizeStock
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
    private $clotheID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sizeID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getClotheId(): ?int
    {
        return $this->clotheID;
    }

    public function setClotheId(int $clotheID): self
    {
        $this->ClotheID = $clotheID;

        return $this;
    }

    public function getSizeId(): ?int
    {
        return $this->sizeID;
    }

    public function setSizeId(int $sizeID): self
    {
        $this->sizeID = $sizeID;

        return $this;
    }

    public function getRealStock(): ?string
    {
        return $this->stock;
    }

    public function setRealStock(?string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDeleteId(): ?int
    {
        return $this->deleteID;
    }

    public function setDeleteId(?int $deleteID): self
    {
        $this->deleteID = $deleteID;

        return $this;
    }
}
