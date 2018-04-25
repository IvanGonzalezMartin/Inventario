<?php

namespace App\Domain\Entity\ProfileEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\ProfileRepository\ProfileDoctrineRepository")
 */

class ProfileEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $shoeSizeId;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $longSleeveShirt;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $shortSleeveShirt;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $fleece;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $poloShirtMenShortSleeve;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $poloShirtMenLongSleeve;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $poloShirtWomanShortSleeve;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $poloShirtWomanLongSleeve;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $jacket;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $vest;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getShoeSizeId()
    {
        return $this->shoeSizeId;
    }

    /**
     * @param mixed $shoeSizeId
     */
    public function setShoeSizeId($shoeSizeId)
    {
        $this->shoeSizeId = $shoeSizeId;
    }

    /**
     * @return mixed
     */
    public function getLongSleeveShirt()
    {
        return $this->longSleeveShirt;
    }

    /**
     * @param mixed $longSleeveShirt
     */
    public function setLongSleeveShirt($longSleeveShirt)
    {
        $this->longSleeveShirt = $longSleeveShirt;
    }

    /**
     * @return mixed
     */
    public function getShortSleeveShirt()
    {
        return $this->shortSleeveShirt;
    }

    /**
     * @param mixed $shortSleeveShirt
     */
    public function setShortSleeveShirt($shortSleeveShirt)
    {
        $this->shortSleeveShirt = $shortSleeveShirt;
    }

    /**
     * @return mixed
     */
    public function getFleece()
    {
        return $this->fleece;
    }

    /**
     * @param mixed $fleece
     */
    public function setFleece($fleece)
    {
        $this->fleece = $fleece;
    }

    /**
     * @return mixed
     */
    public function getPoloShirtMenShortSleeve()
    {
        return $this->poloShirtMenShortSleeve;
    }

    /**
     * @param mixed $poloShirtMenShortSleeve
     */
    public function setPoloShirtMenShortSleeve($poloShirtMenShortSleeve)
    {
        $this->poloShirtMenShortSleeve = $poloShirtMenShortSleeve;
    }

    /**
     * @return mixed
     */
    public function getPoloShirtMenLongSleeve()
    {
        return $this->poloShirtMenLongSleeve;
    }

    /**
     * @param mixed $poloShirtMenLongSleeve
     */
    public function setPoloShirtMenLongSleeve($poloShirtMenLongSleeve)
    {
        $this->poloShirtMenLongSleeve = $poloShirtMenLongSleeve;
    }

    /**
     * @return mixed
     */
    public function getPoloShirtWomanShortSleeve()
    {
        return $this->poloShirtWomanShortSleeve;
    }

    /**
     * @param mixed $poloShirtWomanShortSleeve
     */
    public function setPoloShirtWomanShortSleeve($poloShirtWomanShortSleeve)
    {
        $this->poloShirtWomanShortSleeve = $poloShirtWomanShortSleeve;
    }

    /**
     * @return mixed
     */
    public function getPoloShirtWomanLongSleeve()
    {
        return $this->poloShirtWomanLongSleeve;
    }

    /**
     * @param mixed $poloShirtWomanLongSleeve
     */
    public function setPoloShirtWomanLongSleeve($poloShirtWomanLongSleeve)
    {
        $this->poloShirtWomanLongSleeve = $poloShirtWomanLongSleeve;
    }

    /**
     * @return mixed
     */
    public function getJacket()
    {
        return $this->jacket;
    }

    /**
     * @param mixed $jacket
     */
    public function setJacket($jacket)
    {
        $this->jacket = $jacket;
    }

    /**
     * @return mixed
     */
    public function getVest()
    {
        return $this->vest;
    }

    /**
     * @param mixed $vest
     */
    public function setVest($vest)
    {
        $this->vest = $vest;
    }


}