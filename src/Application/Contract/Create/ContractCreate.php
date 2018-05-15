<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:01
 */

namespace App\Application\Contract\Create;


use App\Domain\Model\Contract\Contract;
use App\Domain\Services\Contract\ContractCreatorService;

class ContractCreate
{
    private $contractCreatorService;

    public function __construct(ContractCreatorService $contractCreatorService)
    {
        $this->contractCreatorService = $contractCreatorService;
    }

    public function handler(ContractCreateCommand $contractCreateCommand)
    {
        $contract = new Contract($contractCreateCommand->id(),$contractCreateCommand->endDate(),$contractCreateCommand->renovation());

        $this->contractCreatorService->__invoke($contract);
    }
}