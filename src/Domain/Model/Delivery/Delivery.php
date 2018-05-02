<?php

namespace App\Domain\Model\Delivery;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DeliveryDoctrineRepository\DeliveryDoctrineRepository")
 */
class Delivery
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $orderID;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sign;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $docSign;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Delivery constructor.
     * @param string $id
     * @param string $orderID
     * @param string $managerID
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $id, string $orderID, string $managerID)
    {
        Assertion::uuid($id);
        Assertion::uuid($orderID);
        Assertion::uuid($managerID);

        $this->id = $id;
        $this->orderID = $orderID;
        $this->managerID = $managerID;
        $this->date = date("Y-m-d H:i:s") ;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getOrderID(): string
    {
        return $this->orderID;
    }

    public function getManagerID(): string
    {
        return $this->managerID;
    }

    /**
     * @param string $managerID
     * @return Delivery
     * @throws \Assert\AssertionFailedException
     */
    public function setManagerID(string $managerID): self
    {
        Assertion::uuid($managerID);

        $this->managerID = $managerID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function getSign(): ?string
    {
        return $this->sign;
    }

    public function setSign(?string $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    public function getDocSign(): ?string
    {
        return $this->docSign;
    }

    public function setDocSign(string $docSign): self
    {
        $this->docSign = $docSign;

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
     * @return Delivery
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}