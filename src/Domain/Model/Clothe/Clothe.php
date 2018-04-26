<?php

namespace App\Domain\Model\Clothe;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClotheDoctrineRepository\ClotheDoctrineRepository")
 */
class Clothe
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getClotheCategoryId(): ?int
    {
        return $this->clotheCategoryID;
    }

    public function setClotheCategoryId(int $clotheCategoryID): self
    {
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
