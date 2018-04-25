<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/04/18
 * Time: 15:38
 */

namespace App\Domain\Entity\ClothesCategoryEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClothesCategoryRepository\ClothesCategoryDoctrineRepository")
 */
class ClothesCategoryEntity
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
    private $clotheName;

    /**
     * @ORM\Column(type="string",nullable=false)
     */
    private $typeId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param mixed $typeId
     */
    public function setTypeId($typeId): void
    {
        $this->typeId = $typeId;
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

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getClotheName()
    {
        return $this->clotheName;
    }

    /**
     * @param mixed $clotheName
     */
    public function setClotheName($clotheName)
    {
        $this->clotheName = $clotheName;
    }


}