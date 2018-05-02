<?php

namespace App\Domain\Model\Contract;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ContractDoctrineRepository\ContractDoctrineRepository")
 */
class Contract
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $userID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $renovation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Contract constructor.
     * @param string $userID
     * @param string $id
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $userID, string $id)
    {
        Assertion::uuid($id);
        Assertion::uuid($userID);

        $this->id = $id;
        $this->userID = $userID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getUserID(): ?string
    {
        return $this->userID;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getRenovation(): ?\DateTimeInterface
    {
        return $this->renovation;
    }

    public function setRenovation(\DateTimeInterface $renovation): self
    {
        $this->renovation = $renovation;

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
     * @return Contract
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}