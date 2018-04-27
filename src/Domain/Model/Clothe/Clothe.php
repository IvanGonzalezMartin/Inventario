<?php

namespace App\Domain\Model\Clothe;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ClotheDoctrineRepository\ClotheDoctrineRepository")
 */
class Clothe
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $clotheCategoryID;


    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $genderID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Clothe constructor.
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

    public function getClotheCategoryId(): ?string
    {
        return $this->clotheCategoryID;
    }

    /**
     * @param string $clotheCategoryID
     * @return Clothe
     * @throws \Assert\AssertionFailedException
     */
    public function setClotheCategoryId(string $clotheCategoryID): self
    {
        Assertion::uuid($clotheCategoryID);

        $this->clotheCategoryID = $clotheCategoryID;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getGenderId(): ?int
    {
        return $this->genderID;
    }

    public function setGenderId(int $genderID): self
    {
        $this->gender = $genderID;

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
     * @return Clothe
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteId(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
