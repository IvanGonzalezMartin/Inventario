<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:24
 */

namespace App\Domain\Services\User;


use App\Application\User\Filter\UserFilterCommand;
use App\Domain\Model\User\UserRepository;

class UserFiltorService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(UserFilterCommand $filterCommand)
    {
        return $this->repository->filter(   $filterCommand->name(),
                                            $filterCommand->codeEmployee(),
                                            $filterCommand->department(),
                                            $filterCommand->parentDepartment(),
                                            $filterCommand->page(),
                                            $filterCommand->usersPerPage()
        );
    }
}