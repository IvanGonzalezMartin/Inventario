<?php

namespace App\Domain\Model\User;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\UserDoctrineRepository\UserDoctrineRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameSurname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $departmentID;

    /**
     * @ORM\Column(type="integer")
     */
    private $genderID;

    /**
     * @ORM\Column(type="integer")
     */
    private $profilerDetailsID;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $contractID;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    public function getId()
    {
        return $this->id;
    }

    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    public function setNickName(string $nickName): self
    {
        $this->nickName = $nickName;

        return $this;
    }

    public function getNameSurname(): ?string
    {
        return $this->nameSurname;
    }

    public function setNameSurname(string $nameSurname): self
    {
        $this->nameSurname = $nameSurname;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmployeeCode(): ?int
    {
        return $this->employeeCode;
    }

    public function setEmployeeCode(int $employeeCode): self
    {
        $this->employeeCode = $employeeCode;

        return $this;
    }

    public function getDepartmentID(): ?int
    {
        return $this->departmentID;
    }

    public function setDepartmentID(int $departmentID): self
    {
        $this->departmentID = $departmentID;

        return $this;
    }

    public function getGenderID(): ?int
    {
        return $this->genderID;
    }

    public function setGenderID(int $genderID): self
    {
        $this->genderID = $genderID;

        return $this;
    }

    public function getProfilerDetailsID(): ?int
    {
        return $this->profilerDetailsID;
    }

    public function setProfilerDetailsID(int $profilerSizesID): self
    {
        $this->profilerDetailsID = $profilerSizesID;

        return $this;
    }

    public function getContractID(): ?string
    {
        return $this->contractID;
    }

    /**
     * @param string $contractID
     * @return User
     * @throws \Assert\AssertionFailedException
     */
    public function setContractID(string $contractID): self
    {
        Assertion::uuid($contractID);

        $this->contractID = $contractID;

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
     * @param string $deleteID
     * @return User
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
