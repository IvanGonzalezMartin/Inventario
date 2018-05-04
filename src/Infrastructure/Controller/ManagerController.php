<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:28
 */

namespace App\Infrastructure\Controller;


use App\Application\Manager\CheckEmail\ManagerCheckEmail;
use App\Application\Manager\CheckEmail\ManagerCheckEmailCommand;
use App\Application\Manager\CheckNickName\ManagerCheckNickName;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ManagerController
{
    private $checkManagerNickName;
    private $managerCheckEmail;

    public function __construct(ManagerCheckNickName $checkManagerNickName, ManagerCheckEmail $managerCheckEmail)
    {
        $this->checkManagerNickName = $checkManagerNickName;
        $this->managerCheckEmail = $managerCheckEmail;
    }

    public function checkNickName(Request $request)
    {

        $nickName = $request->query->get('nickName');

        $managerCheckNickNameCommand = new ManagerCheckNickNameCommand($nickName);
        $this->checkManagerNickName->handler($managerCheckNickNameCommand);

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function checkEmail(Request $request)
    {
        $email= $request->query->get('email');
        $managerCheckEmailCommand = new ManagerCheckEmailCommand($email);
        $this->managerCheckEmail->handler($managerCheckEmailCommand);

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }
}