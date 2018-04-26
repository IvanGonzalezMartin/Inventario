<?php

namespace App\Domain\Model\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\UserDoctrineRepository\UserDoctrineRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
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
    private $profilerSizesID;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $contractID;

    /**
     * @ORM\Column(type="integer", nullable=true)
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

    public function getProfilerSizesID(): ?int
    {
        return $this->profilerSizesID;
    }

    public function setProfilerSizesID(int $profilerSizesID): self
    {
        $this->profilerSizesID = $profilerSizesID;

        return $this;
    }

    public function getContractID(): ?int
    {
        return $this->contractID;
    }

    public function setContractID(int $contractID): self
    {
        $this->contractID = $contractID;

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
