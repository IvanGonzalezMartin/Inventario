<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:02
 */

namespace App\Domain\Services\Contract;


use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\Contract\Exceptions\ContractDoesntExistException;
use App\Domain\Model\User\UserRepository;

class ContractCreatorService
{
    /**
     * @var ContractRepository
     */
    private $contractRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ContractRepository $contractRepository, UserRepository $userRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(Contract $contract)
    {
        if($contract->getEndDate() < \DateTime::createFromFormat('d-m-Y', date('d-m-Y')))


        $user = $this->userRepository->findById($contract->getUserID());

        if(empty($user))
            throw new ContractDoesntExistException($contract->getUserID());



        $this->contractRepository->insert($contract);

    }
}