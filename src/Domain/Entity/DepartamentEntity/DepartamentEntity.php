<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/04/18
 * Time: 15:42
 */

namespace App\Domain\Entity\DepartamentEntity;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ClothesCategoryRepository\ClothesCategoryRepository")
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
}