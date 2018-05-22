<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:46
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Department\DepartmentCheckExistService;
use App\Domain\Services\Gender\GenderCheckExistService;

class UserUpdatorService
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

    public function __invoke(User $newUser)
    {
        $oldUser = $this->repository->findByID($newUser->getId());

        if (empty($oldUser))
            throw new UserDoesntExistsException($newUser->getId());

        if ($oldUser->getEmail() !== $newUser->getEmail())
            $this->checkEmail->__invoke($newUser->getEmail());

        if ($oldUser->getNickName() !== $newUser->getNickName())
            $this->checkNickName->__invoke($newUser->getNickName());

        if ($oldUser->getNif() !== $newUser->getNif())
            $this->checkNif->__invoke($newUser->getNif());

        if ($oldUser->getEmployeeCode() !== $newUser->getEmployeeCode())
            $this->checkEmployeeCode->__invoke($newUser->getEmployeeCode());

        if ($oldUser->getDepartmentID() !== $newUser->getDepartmentID())
            $this->departmentCheckExist->__invoke($newUser->getDepartmentID());

        if ($oldUser->getGender() !== $newUser->getGender())
            $this->genderCheckExist->__invoke($newUser->getGender());

        UserSetAllParamsService::execute($oldUser, $newUser);

        $this->repository->update();
    }
}