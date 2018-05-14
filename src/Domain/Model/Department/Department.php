<?php

namespace App\Domain\Model\Department;

use App\Domain\Model\Department\Exceptions\DepartmentNameException;
use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\DepartmentDoctrineRepository\DepartmentDoctrineRepository")
 */
class Department
{

    const MIN_LENGTH_DEPARTMENT = 5;
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
        $this->setName($name);
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
        if (self::MIN_LENGTH_DEPARTMENT > strlen($name)){
            throw new DepartmentNameException(self::MIN_LENGTH_DEPARTMENT);
        }

        $this->name = $name;

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
