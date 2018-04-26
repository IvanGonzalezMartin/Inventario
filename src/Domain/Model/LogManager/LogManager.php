<?php

namespace App\Domain\Model\LogManager;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\LogManagerDoctrineRepository\LogManagerDoctrineRepository")
 */
class LogManager
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->date = date("Y-m-d H:i:s") ;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

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
}
