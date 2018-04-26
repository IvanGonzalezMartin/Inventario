<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
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
    private $userID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->date = date("Y-m-d H:i:s") ;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dresciption;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deliveryID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    /**
     * Order constructor.
     * @param $date
     */

    public function getId()
    {
        return $this->id;
    }

    public function getUserID(): ?int
    {
        return $this->userID;
    }

    public function setUserID(int $userID): self
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

    public function getDresciption(): ?string
    {
        return $this->dresciption;
    }

    public function setDresciption(?string $dresciption): self
    {
        $this->dresciption = $dresciption;

        return $this;
    }

    public function getDeliveryId(): ?int
    {
        return $this->deliveryID;
    }

    public function setDeliveryId(?int $deliveryID): self
    {
        $this->deliveryID = $deliveryID;

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
