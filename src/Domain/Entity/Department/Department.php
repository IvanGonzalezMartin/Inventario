<?php

namespace App\Domain\Entity\Department;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\DepartmentDoctrineRepository\DepartmentDoctrineRepository")
 */
class Department
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
    private $parentDepartmentID;

    /**
     * @ORM\Column(type="string", length=255)
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

    public function getParentDepartmentID(): ?int
    {
        return $this->parentDepartmentID;
    }

    public function setParentDepartmentID(int $parentDepartmentID): self
    {
        $this->parentDepartmentID = $parentDepartmentID;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
