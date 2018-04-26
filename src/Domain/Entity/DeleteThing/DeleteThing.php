<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeleteThingRepository")
 */
class DeleteThing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $deleteThingID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOfThing;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $managerID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getId()
    {
        return $this->id;
    }

    public function getDeleteThingID(): ?int
    {
        return $this->deleteThingID;
    }

    public function setDeleteThingID(int $deleteThingID): self
    {
        $this->deleteThingID = $deleteThingID;

        return $this;
    }

    public function getNameOfThing(): ?string
    {
        return $this->nameOfThing;
    }

    public function setNameOfThing(string $nameOfThing): self
    {
        $this->nameOfThing = $nameOfThing;

        return $this;
    }

    public function getManagerID(): ?int
    {
        return $this->managerID;
    }

    public function setManagerID(?int $managerID): self
    {
        $this->managerID = $managerID;

        return $this;
    }

    public function getUserID(): ?int
    {
        return $this->userID;
    }

    public function setUserID(?int $userID): self
    {
        $this->userID = $userID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
}
