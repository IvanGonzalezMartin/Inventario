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
     * @return mixed
     */
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