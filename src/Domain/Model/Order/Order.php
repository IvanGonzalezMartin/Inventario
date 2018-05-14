<?php

namespace App\Domain\Model\Order;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\OrderDoctrineRepository\OrderDoctrineRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $userID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deliveryID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;


    /**
     * Order constructor.
     * @param string $id
     * @param string $userId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $id, string $userId)
    {

        Assertion::uuid($id);
        Assertion::uuid($userId);

        $this->id = $id;
        $this->userID = $userId;
        $this->date = new \DateTime() ;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserID(): ?string
    {
        return $this->userID;
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

    public function getDeliveryId(): ?string
    {
        return $this->deliveryID;
    }

    /**
     * @param null|string $deliveryID
     * @return Order
     * @throws \Assert\AssertionFailedException
     */
    public function setDeliveryId(?string $deliveryID): self
    {
        Assertion::uuid($deliveryID);

        $this->deliveryID = $deliveryID;

        return $this;
    }

    public function isNotDeleted(): bool
    {
        $deleted = false;

        if (null == $this->deleteID || '' == $this->deleteID)
            $deleted = true;

        return $deleted;
    }

    public function isDeleted(): bool
    {
        $deleted = true;

        if (null == $this->deleteID || '' == $this->deleteID)
            $deleted = false;

        return $deleted;
    }

    /**
     * @param string $deleteID
     * @return Order
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
