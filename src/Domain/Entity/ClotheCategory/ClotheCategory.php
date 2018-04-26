<?php

namespace App\Domain\Entity\ClotheCategory;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClotheCategoryDoctrineRepository\ClotheCategoryDoctrineRepository")
 */
class ClotheCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $sizeTypeID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSizeTypeID(): ?string
    {
        return $this->sizeTypeID;
    }

    public function setSizeTypeID(string $sizeTypeID): self
    {
        $this->sizeTypeID = $sizeTypeID;

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
