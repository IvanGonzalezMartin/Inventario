<?php

namespace App\Domain\Model\Clothe;

interface ClotheRepository
{
    public function insert(Clothe $clothe): void;
}