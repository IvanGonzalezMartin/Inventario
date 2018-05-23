<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 11:19
 */

namespace App\Application\Contract\GetPart;


use App\Domain\Services\Contract\ContractGetPartService;

class ContractGetPart
{
    private $contractPartService;
    private $dataTransform;

    public function __construct(ContractGetPartService $contractPartService, ContractGetPartDataTransform $dataTransform)
    {
        $this->contractPartService = $contractPartService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(ContractGetPartCommand $contractGetPartCommand)
    {
        return $this->dataTransform->transform($this->contractPartService->__invoke($contractGetPartCommand->userID()));
    }
}