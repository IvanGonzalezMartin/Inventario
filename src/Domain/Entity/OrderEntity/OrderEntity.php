<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 10:58
 */

namespace App\Domain\Entity\OrderEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\OrderRepository\OrderDoctrineRepository")
 */
class OrderEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $employeeCode;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $adminId;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

    /**
     * @ORM\Column(type="string")
     */
    private $signing;

    /**
     * @ORM\Column(type="string")
     */
    private $docSigning;

    /**
     * @ORM\Column(type="date")
     */
    private $deleteDate;

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
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * @param mixed $employeeCode
     */
    public function setEmployeeCode($employeeCode): void
    {
        $this->employeeCode = $employeeCode;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * @param mixed $adminId
     */
    public function setAdminId($adminId): void
    {
        $this->adminId = $adminId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function setDelete($delete): void
    {
        $this->delete = $delete;
    }

    /**
     * @return mixed
     */
    public function getSigning()
    {
        return $this->signing;
    }

    /**
     * @param mixed $signing
     */
    public function setSigning($signing): void
    {
        $this->signing = $signing;
    }

    /**
     * @return mixed
     */
    public function getDocSigning()
    {
        return $this->docSigning;
    }

    /**
     * @param mixed $docSigning
     */
    public function setDocSigning($docSigning): void
    {
        $this->docSigning = $docSigning;
    }

    /**
     * @return mixed
     */
    public function getDeleteDate()
    {
        return $this->deleteDate;
    }

    /**
     * @param mixed $deleteDate
     */
    public function setDeleteDate($deleteDate): void
    {
        $this->deleteDate = $deleteDate;
    }

}