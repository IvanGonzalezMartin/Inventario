<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:28
 */

namespace App\Infrastructure\Controller;


use App\Application\Manager\CheckNickName\CheckManagerNickName;
use App\Application\Manager\CheckNickName\CheckManagerNickNameCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ManagerController
{
    private $checkManagerNickName;

    public function __construct(CheckManagerNickName $checkManagerNickName)
    {
        $this->checkManagerNickName = $checkManagerNickName;
    }

    public function checkNickName(Request $request)
    {
        $nickName = $request->query->get('nickName');
        $roleCreateCommand = new CheckManagerNickNameCommand($nickName);
        $this->checkManagerNickName->handler($roleCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}