<?php

namespace App\Domain\Entity\ClothesEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClothesRepository\ClothesDoctrineRepository")
 */
class ClothesEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=255, nullable=false)
     */
    private $categoryId;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $clotheName;

    /**
     * @ORM\Column(type="text")
     */
    private $clotheDescripcion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleteClothe;

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
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
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

    /**
     * @return mixed
     */
    public function getClotheDescripcion()
    {
        return $this->clotheDescripcion;
    }

    /**
     * @param mixed $clotheDescripcion
     */
    public function setClotheDescripcion($clotheDescripcion)
    {
        $this->clotheDescripcion = $clotheDescripcion;
    }

    /**
     * @return mixed
     */
    public function getDeleteClothe()
    {
        return $this->deleteClothe;
    }

    /**
     * @param mixed $deleteClothe
     */
    public function setDeleteClothe($deleteClothe)
    {
        $this->deleteClothe = $deleteClothe;
    }


}