<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfilerDetailsRepository")
 */
class ProfilerDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $profilerID;

    /**
     * @ORM\Column(type="integer")
     */
    private $sizeID;

    /**
     * @ORM\Column(type="integer")
     */
    private $clotheCategoryID;

    public function getId()
    {
        return $this->id;
    }

    public function getProfilerID(): ?int
    {
        return $this->profilerID;
    }

    public function setProfilerID(int $profilerID): self
    {
        $this->profilerID = $profilerID;

        return $this;
    }

    public function getSizeID(): ?int
    {
        return $this->sizeID;
    }

    public function setSizeID(int $sizeID): self
    {
        $this->sizeID = $sizeID;

        return $this;
    }

    public function getClotheCategoryID(): ?int
    {
        return $this->clotheCategoryID;
    }

    public function setClotheCategoryID(int $clotheCategoryID): self
    {
        $this->clotheCategoryID = $clotheCategoryID;

        return $this;
    }
}
