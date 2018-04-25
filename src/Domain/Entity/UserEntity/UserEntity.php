<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/04/18
 * Time: 15:03
 */

namespace App\Domain\Entity\UserEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\UserRepository\UserDoctrineRepository")
 */

class UserEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $nameAndSurname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NIF;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $workerCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $departmentId;

    /**
     * @ORM\Column(type="integer")
     */
    private $profilerId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfDelete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $endOfContractDate;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $possibleHiring;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNameAndSurname()
    {
        return $this->nameAndSurname;
    }

    /**
     * @param mixed $nameAndSurname
     */
    public function setNameAndSurname($nameAndSurname)
    {
        $this->nameAndSurname = $nameAndSurname;
    }

    /**
     * @return mixed
     */
    public function getNIF()
    {
        return $this->NIF;
    }

    /**
     * @param mixed $NIF
     */
    public function setNIF($NIF)
    {
        $this->NIF = $NIF;
    }

    /**
     * @return mixed
     */
    public function getWorkerCode()
    {
        return $this->workerCode;
    }

    /**
     * @param mixed $workerCode
     */
    public function setWorkerCode($workerCode)
    {
        $this->workerCode = $workerCode;
    }

    /**
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param mixed $departmentId
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * @return mixed
     */
    public function getProfilerId()
    {
        return $this->profilerId;
    }

    /**
     * @param mixed $profilerId
     */
    public function setProfilerId($profilerId)
    {
        $this->profilerId = $profilerId;
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param mixed $delete
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
    }

    /**
     * @return mixed
     */
    public function getDateOfDelete()
    {
        return $this->dateOfDelete;
    }

    /**
     * @param mixed $dateOfDelete
     */
    public function setDateOfDelete($dateOfDelete)
    {
        $this->dateOfDelete = $dateOfDelete;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getEndOfContractDate()
    {
        return $this->endOfContractDate;
    }

    /**
     * @param mixed $endOfContractDate
     */
    public function setEndOfContractDate($endOfContractDate)
    {
        $this->endOfContractDate = $endOfContractDate;
    }

    /**
     * @return mixed
     */
    public function getPossibleHiring()
    {
        return $this->possibleHiring;
    }

    /**
     * @param mixed $possibleHiring
     */
    public function setPossibleHiring($possibleHiring)
    {
        $this->possibleHiring = $possibleHiring;
    }
}