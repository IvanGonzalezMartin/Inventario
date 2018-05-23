<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:36
 */

namespace App\Application\User\GetByUuid;


use App\Domain\Services\User\UserGetterByUuidService;

class UserGetByUuid
{
    /**
     * @var UserGetterByUuidService
     */
    private $userGetterByUuidService;
    /**
     * @var UserGetByUuidDataTransform
     */
    private $dataTransform;

    public function __construct(UserGetterByUuidService $userGetterByUuidService, UserGetByUuidDataTransform $dataTransform)
    {
        $this->userGetterByUuidService = $userGetterByUuidService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(UserGetByUuidCommand $getByUuidCommand)
    {
        return $this->dataTransform->transform($this->userGetterByUuidService->__invoke($getByUuidCommand));
    }
}