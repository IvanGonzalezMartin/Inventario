<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SizesRepository")
 */
class Sizes
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
    private $size;

    /**
     * @ORM\Column(type="integer", nullable=false)
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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->Size = $size;

        return $this;
    }

    public function getSizeTypeId(): ?int
    {
        return $this->sizeTypeID;
    }

    public function setSizeTypeId(int $sizeTypeID): self
    {
        $this->SizeTypeID = $sizeTypeID;

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
