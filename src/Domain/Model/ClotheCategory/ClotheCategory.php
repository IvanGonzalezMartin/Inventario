<?php

namespace App\Domain\Model\ClotheCategory;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ClotheCategoryDoctrineRepository\ClotheCategoryDoctrineRepository")
 */
class ClotheCategory
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sizeTypeID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deleteID;

    /**
     * ClotheCategory constructor.
     * @param $id
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id)
    {
        Assertion::uuid($id);

        $this->id = $id;
    }

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

    public function getSizeTypeID(): ?int
    {
        return $this->sizeTypeID;
    }


    public function setSizeTypeID(int $sizeTypeID): self
    {
        $this->sizeTypeID = $sizeTypeID;

        return $this;
    }

    public function isNotDeleted(): bool
    {
        $statment = false;

        if (null === $this->deleteID)
            $statment = true;

        return $statment;
    }

    /**
     * @param null|string $deleteID
     * @return ClotheCategory
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
