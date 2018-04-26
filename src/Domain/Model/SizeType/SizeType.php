<?php

namespace App\Domain\Model\SizeType;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\SizeTypeDoctrineRepository\SizeTypeDoctrineRepository")
 */
class SizeType
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
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->Name = $name;

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
