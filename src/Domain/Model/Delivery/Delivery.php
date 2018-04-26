<?php

namespace App\Domain\Model\Delivery;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\DeliveryDoctrineRepository\DeliveryDoctrineRepository")
 */
class Delivery
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
    private $orderID;

    /**
     * @ORM\Column(type="integer")
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = date("Y-m-d H:i:s") ;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sign;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $docSign;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getOrderID(): ?int
    {
        return $this->orderID;
    }

    public function setOrderID(int $orderID): self
    {
        $this->orderID = $orderID;

        return $this;
    }

    public function getManagerID(): ?int
    {
        return $this->managerID;
    }

    public function setManagerID(int $managerID): self
    {
        $this->managerID = $managerID;

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

    public function getDeleteID(): ?int
    {
        return $this->deleteID;
    }

    public function setDeleteID(?int $deleteID): self
    {
        $this->deleteID = $deleteID;

        return $this;
    }
}
