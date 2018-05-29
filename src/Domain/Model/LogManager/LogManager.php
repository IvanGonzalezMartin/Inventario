<?php

namespace App\Domain\Model\LogManager;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Model\LogManagerDoctrineRepository\LogManagerDoctrineRepository")
 */
class LogManager
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $managerID;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDate;

    public function __construct($managerId, $token)
    {
        $this->managerID = $managerId;
        $this->token = $token;
        $this->startDate = new \DateTime();
        $this->addTime();
    }

    public function token(): ?string
    {
        return $this->token;
    }

    private function addTime(): void
    {
        $this->date = new \DateTime();
        $this->date->add(\DateInterval::createFromDateString('+30 minutes'));
    }

    public function getManagerID()
    {
        return $this->managerID;
    }

    public function inRangeOfTime(): bool
    {
        if (1 == ($this->date <=> new \DateTime())) {
            $this->addTime();
            return false;
        }
        $this->logOut();
        return true;
    }

    public function logOut()
    {
        $this->endDate = new \DateTime();
    }
}
