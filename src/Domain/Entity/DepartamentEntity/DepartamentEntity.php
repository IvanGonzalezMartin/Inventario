<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/04/18
 * Time: 15:42
 */

namespace App\Domain\Entity\DepartamentEntity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\DepartamentRepository\DepartamentDoctrineRepository")
 */
class DepartamentEntity
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
    private $departamentName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleteDepartament;

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
    public function getDepartamentName()
    {
        return $this->departamentName;
    }

    /**
     * @param mixed $departamentName
     */
    public function setDepartamentName($departamentName)
    {
        $this->departamentName = $departamentName;
    }

    /**
     * @return mixed
     */
    public function getDeleteDepartament()
    {
        return $this->deleteDepartament;
    }

    /**
     * @param mixed $deleteDepartament
     */
    public function setDeleteDepartament($deleteDepartament)
    {
        $this->deleteDepartament = $deleteDepartament;
    }


}