<?php

namespace App\Domain\Model\Manager;


use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ManagerDoctrineRepository\ManagerDoctrineRepository")
 */
class Manager
{
    const EMAIL_FAIL = 'fiel email must be type of email';
    const ROL_ID_FAIL = 'rol id must be numeric';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nickName;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $rolID;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $deleteID;

    /**
     * Manager constructor.
     * @param $nickName
     * @param $name
     * @param $rolID
     * @param $password
     * @param $email
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($nickName, $name, $rolID, $password, $email)
    {
        $this->nickName = $nickName;
        $this->name = $name;
        $this->setRolID($rolID);
        $this->setPassword($password);
        $this->setEmail($email);
    }


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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getRolID(): ?int
    {
        return $this->rolID;
    }

    /**
     * @param int|null $rolID
     * @return Manager
     * @throws \Assert\AssertionFailedException
     */
    public function setRolID($rolID): self
    {
        Assertion::numeric($rolID, self::ROL_ID_FAIL);
        $this->rolID = $rolID;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function checkPassword(string $password): bool
    {
        return password_verify ($password, $this->password);
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Manager
     * @throws \Assert\AssertionFailedException
     */
    public function setEmail($email): self
    {
        Assertion::email($email, self::EMAIL_FAIL);
        $this->email = $email;

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
     * @return Manager
     * @throws \Assert\AssertionFailedException
     */
    public function setDeleteID(string $deleteID): self
    {
        Assertion::uuid($deleteID);

        $this->deleteID = $deleteID;

        return $this;
    }
}
