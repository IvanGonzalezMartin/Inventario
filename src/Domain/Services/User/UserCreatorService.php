<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:46
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Department\DepartmentCheckExistService;
use App\Domain\Services\Gender\GenderCheckExistService;

class UserCreatorService
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var UserCheckEmailService
     */
    private $checkEmail;
    /**
     * @var UserCheckNickNameService
     */
    private $checkNickName;
    /**
     * @var UserCheckNifService
     */
    private $checkNif;
    /**
     * @var UserCheckEmployeeCodeService
     */
    private $checkEmployeeCode;
    /**
     * @var DepartmentCheckExistService
     */
    private $departmentCheckExist;
    /**
     * @var GenderCheckExistService
     */
    private $genderCheckExist;
    /**
     * @var UserCheckUuidExistService
     */
    private $checkUuidExist;

    public function __construct(UserRepository $userRepository,
                                UserCheckEmailService $checkEmail,
                                UserCheckNickNameService $checkNickName,
                                UserCheckNifService $checkNif,
                                UserCheckEmployeeCodeService $checkEmployeeCode,
                                DepartmentCheckExistService $departmentCheckExist,
                                GenderCheckExistService $genderCheckExist,
                                UserCheckUuidExistService $checkUuidExist)
    {
        $this->repository = $userRepository;
        $this->checkEmail = $checkEmail;
        $this->checkNickName = $checkNickName;
        $this->checkNif = $checkNif;
        $this->checkEmployeeCode = $checkEmployeeCode;
        $this->departmentCheckExist = $departmentCheckExist;
        $this->genderCheckExist = $genderCheckExist;
        $this->checkUuidExist = $checkUuidExist;
    }

    public function __invoke(User $user)
    {
        $this->checkUuidExist->__invoke($user->getId());
        $this->checkEmail->__invoke($user->getEmail());
        $this->checkNickName->__invoke($user->getNickName());
        $this->checkNif->__invoke($user->getNif());
        $this->checkEmployeeCode->__invoke($user->getEmployeeCode());
        $this->departmentCheckExist->__invoke($user->getDepartmentID());
        $this->genderCheckExist->__invoke($user->getGender());

        $this->repository->insert($user);
        $this->repository->update();
    }
}