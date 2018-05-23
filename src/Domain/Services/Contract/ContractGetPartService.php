<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 11:24
 */

namespace App\Domain\Services\Contract;


use App\Application\Contract\GetPart\ContractGetPartCommand;
use App\Domain\Model\Contract\ContractRepository;

class ContractGetPartService
{
    /**
     * @var ContractRepository
     */
    private $repository;


    public function __construct(ContractRepository $contractRepository)
    {
        $this->repository = $contractRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke($userID)
    {
        return $this->repository->findByUserId($userID);
    }
}