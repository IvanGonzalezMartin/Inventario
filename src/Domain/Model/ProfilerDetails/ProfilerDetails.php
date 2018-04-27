<?php

namespace App\Domain\Model\ProfilerDetails;

use Assert\Assertion;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\ProfilerDetailsDoctrineRepository\ProfilerDetailsDoctrineRepository")
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
     * @ORM\Column(type="string", length=50)
     */
    private $clotheCategoryID;

    /**
     * ProfilerDetails constructor.
     * @param int $profilerID
     * @param int $sizeID
     * @param string $clotheCategoryID
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(int $profilerID, int $sizeID, string $clotheCategoryID)
    {
        Assertion::uuid($clotheCategoryID);

        $this->profilerID = $profilerID;
        $this->sizeID = $sizeID;
        $this->clotheCategoryID = $clotheCategoryID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProfilerID(): ?int
    {
        return $this->profilerID;
    }

    public function getSizeID(): ?int
    {
        return $this->sizeID;
    }

    public function getClotheCategoryID(): ?int
    {
        return $this->clotheCategoryID;
    }

}
