<?php

namespace App\Domain\Model\OrderDetails;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\OrderDoctrineRepository\OrderDoctrineRepository")
 */
class OrderDetails
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
    private $clotheSizeStockID;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $orderID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * OrderDetails constructor.
     * @param string $clotheSizeStockID
     * @param string $orderID
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $clotheSizeStockID, string $orderID)
    {
        Assertion::uuid($clotheSizeStockID);
        Assertion::uuid($orderID);

        $this->clotheSizeStockID = $clotheSizeStockID;
        $this->orderID = $orderID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClotheSizeStockID(): ?int
    {
        return $this->clotheSizeStockID;
    }

    public function setClotheSizeStockID(int $clotheSizeStockID): self
    {
        $this->clotheSizeStockID = $clotheSizeStockID;

        return $this;
    }

    public function getOrderID(): ?string
    {
        return $this->orderID;
    }

    public function isNotDeleted(): bool
    {
        $statment = false;

        if (null === $this->deleteID)
            $statment = true;

        return $statment;
    }

    /**
     * @param string $deleteID
     * @return OrderDetails
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
