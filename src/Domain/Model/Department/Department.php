<?php

namespace App\Domain\Model\Department;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DepartmentDoctrineRepository\DepartmentDoctrineRepository")
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
     * @ORM\Column(type="string", length=50)
     */
    private $parentDepartmentID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Department constructor.
     * @param string $id
     * @param string $parentDepartmentID
     * @param string $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(int $parentDepartmentID, string $name)
    {
        $this->parentDepartmentID = $parentDepartmentID;
        $this->name = $name;
    }

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

    public function isNotDeleted(): bool
    {
        $statment = false;

        if (null === $this->deleteID)
            $statment = true;

        return $statment;
    }

    /**
     * @param null|string $deleteID
     * @return Department
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(?string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
