<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 9:00
 */

namespace App\Application\Contract\Update;

use App\Domain\Model\Contract\Contract;
use App\Domain\Services\Contract\ContractUpdateService;

class ContractUpdate
{
    private $contractUpdateService;

    public function __construct(ContractUpdateService $contractUpdateService)
    {
        $this->contractUpdateService = $contractUpdateService;
    }

    public function handler(ContractUpdateCommand $contractUpdateCommand)
    {
        $contract = new Contract($contractUpdateCommand->id(),$contractUpdateCommand->endDate(),$contractUpdateCommand->renovation());

        $this->contractUpdateService->__invoke($contract);
    }
}