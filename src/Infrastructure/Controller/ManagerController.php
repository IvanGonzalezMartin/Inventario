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
use App\Application\Manager\Create\ManagerCreate;
use App\Application\Manager\Create\ManagerCreateCommand;
use App\Application\Manager\Delete\ManagerDelete;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Application\Manager\GetAll\ManagerGetAll;
use App\Application\Manager\Update\ManagerUpdate;
use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ManagerController extends OwnController
{
    private $checkManagerNickName;
    private $managerCheckEmail;
    private $managerCreate;
    private $managerUpdate;
    private $managerDelete;
    private $managerGetAll;

    public function __construct(ManagerCheckNickName $checkManagerNickName,
                                ManagerCheckEmail $managerCheckEmail,
                                ManagerCreate $managerCreate,
                                ManagerUpdate $managerUpdate,
                                ManagerDelete $managerDelete,
                                ManagerGetAll $managerGetAll)
    {
        $this->checkManagerNickName = $checkManagerNickName;
        $this->managerCheckEmail = $managerCheckEmail;
        $this->managerCreate = $managerCreate;
        $this->managerUpdate = $managerUpdate;
        $this->managerDelete = $managerDelete;
        $this->managerGetAll = $managerGetAll;
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

    public function createManager(Request $request)
    {

        $newReq = json_decode($request->getContent());

        $managerCreateManagerCommand = new ManagerCreateCommand(
                                                                $newReq->nickName,
                                                                $newReq->name,
                                                                $newReq->photo,
                                                                $newReq->rolID,
                                                                $newReq->password,
                                                                $newReq->email
        );

        $this->managerCreate->handler($managerCreateManagerCommand);

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function updateManager(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $managerUpdateCommand = new ManagerUpdateCommand(
                                                        $newReq->id,
                                                        $newReq->nickName,
                                                        $newReq->name,
                                                        $newReq->photo,
                                                        $newReq->rolID,
                                                        $newReq->password,
                                                        $newReq->email
        );

        $this->managerUpdate->handler($managerUpdateCommand);

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function deleteManager(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $managerDeleteCommand = new ManagerDeleteCommand($newReq->id);

        $this->managerDelete->handler($managerDeleteCommand);

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function getAllManager()
    {
        return new JsonResponse($this->managerGetAll->handler(),MyOwnHttpCodes::HTTP_OK);
    }
}