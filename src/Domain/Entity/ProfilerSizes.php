<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfilerSizesRepository")
 */
class ProfilerSizes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $longSleeveShirt;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $shortSleeveShirt;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $fleece;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $poloShirtMenLongSleeve;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $poloShirtMenShortSleeve;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $poloShirtWomenLongSleeve;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $poloShirtWomenSHortSleeve;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $windbreaker;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $shoe;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $vest;

    public function getId()
    {
        return $this->id;
    }

    public function getLongSleeveShirt(): ?int
    {
        return $this->longSleeveShirt;
    }

    public function setLongSleeveShirt(int $longSleeveShirt): self
    {
        $this->longSleeveShirt = $longSleeveShirt;

        return $this;
    }

    public function getShortSleeveShirt(): ?int
    {
        return $this->shortSleeveShirt;
    }

    public function setShortSleeveShirt(int $shortSleeveShirt): self
    {
        $this->shortSleeveShirt = $shortSleeveShirt;

        return $this;
    }

    public function getFleece(): ?int
    {
        return $this->fleece;
    }

    public function setFleece(int $fleece): self
    {
        $this->fleece = $fleece;

        return $this;
    }

    public function getPoloShirtMenLongSleeve(): ?int
    {
        return $this->poloShirtMenLongSleeve;
    }

    public function setPoloShirtMenLongSleeve(int $poloShirtMenLongSleeve): self
    {
        $this->poloShirtMenLongSleeve = $poloShirtMenLongSleeve;

        return $this;
    }

    public function getPoloShirtMenShortSleeve(): ?int
    {
        return $this->poloShirtMenShortSleeve;
    }

    public function setPoloShirtMenShortSleeve(int $poloShirtMenShortSleeve): self
    {
        $this->poloShirtMenShortSleeve = $poloShirtMenShortSleeve;

        return $this;
    }

    public function getPoloShirtWomenLongSleeve(): ?int
    {
        return $this->poloShirtWomenLongSleeve;
    }

    public function setPoloShirtWomenLongSleeve(int $poloShirtWomenLongSleeve): self
    {
        $this->poloShirtWomenLongSleeve = $poloShirtWomenLongSleeve;

        return $this;
    }

    public function getPoloShirtWomenSHortSleeve(): ?int
    {
        return $this->poloShirtWomenSHortSleeve;
    }

    public function setPoloShirtWomenSHortSleeve(int $poloShirtWomenSHortSleeve): self
    {
        $this->poloShirtWomenSHortSleeve = $poloShirtWomenSHortSleeve;

        return $this;
    }

    public function getWindbreaker(): ?int
    {
        return $this->windbreaker;
    }

    public function setWindbreaker(int $windbreaker): self
    {
        $this->windbreaker = $windbreaker;

        return $this;
    }

    public function getShoe(): ?int
    {
        return $this->shoe;
    }

    public function setShoe(int $shoe): self
    {
        $this->shoe = $shoe;

        return $this;
    }

    public function getVest(): ?int
    {
        return $this->vest;
    }

    public function setVest(int $vest): self
    {
        $this->vest = $vest;

        return $this;
    }
}
