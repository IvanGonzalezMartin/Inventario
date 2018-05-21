<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:28
 */

namespace App\Infrastructure\Controller;

use App\Application\Manager\CheckEmail\ManagerCheckEmailCommand;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameCommand;
use App\Application\Manager\Create\ManagerCreateCommand;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Application\Manager\GetAll\ManagerGetAllCommand;
use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ManagerController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function checkNickName(Request $request)
    {
        $nickName = $request->query->get('nickName');

        $this->commandBus->handle(new ManagerCheckNickNameCommand($nickName));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function checkEmail(Request $request)
    {
        $this->commandBus->handle(new ManagerCheckEmailCommand($request->query->get('email')));

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    public function createManager(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ManagerCreateCommand(
                                                    $newReq->nickName,
                                                    $newReq->name,
                                                    $newReq->photo,
                                                    $newReq->rolID,
                                                    $newReq->password,
                                                    $newReq->email)
        );

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

        $this->commandBus->handle(new ManagerUpdateCommand(
                                                    $newReq->id,
                                                    $newReq->nickName,
                                                    $newReq->name,
                                                    $newReq->photo,
                                                    $newReq->rolID,
                                                    $newReq->password,
                                                    $newReq->email
                            )
        );

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

        $this->commandBus->handle(new ManagerDeleteCommand($newReq->id));

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function getAllManager()
    {
        return new JsonResponse($this->commandBus->handle(new ManagerGetAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}