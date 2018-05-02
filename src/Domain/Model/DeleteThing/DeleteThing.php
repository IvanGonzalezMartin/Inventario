<?php

namespace App\Domain\Model\DeleteThing;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DeleteThingDoctrineRepository\DeleteThingDoctrineRepository")
 */
class DeleteThing
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $deleteThingID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOfThing;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $managerID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
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

    /**
     * DeleteThing constructor.
     * @param string $id
     * @param string $deleteThingID
     * @param string $nameOfThing
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $id, string $deleteThingID, string $nameOfThing)
    {

        Assertion::uuid($id);
        Assertion::uuid($deleteThingID);

        $this->id = $id;
        $this->deleteThingID = $deleteThingID;
        $this->nameOfThing = $nameOfThing;
        $this->date = date("Y-m-d H:i:s");
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDeleteThingID(): ?int
    {
        return $this->deleteThingID;
    }

    public function getNameOfThing(): ?string
    {
        return $this->nameOfThing;
    }

    public function getManagerID(): ?int
    {
        return $this->managerID;
    }

    /**
     * @param null|string $managerID
     * @return DeleteThing
     * @throws \Assert\AssertionFailedException
     */
    public function setManagerID(?string $managerID): self
    {
        Assertion::uuid($managerID);

        $this->managerID = $managerID;

        return $this;
    }

    public function getUserID(): ?string
    {
        return $this->userID;
    }

    /**
     * @param null|string $userID
     * @return DeleteThing
     * @throws \Assert\AssertionFailedException
     */
    public function setUserID(?string $userID): self
    {
        Assertion::uuid($userID);

        $this->userID = $userID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
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