<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 13:53
 */

namespace App\Infrastructure\Controller;


use App\Application\User\Create\UserCreateCommand;
use App\Application\User\Delete\UserDeleteCommand;
use App\Application\User\GetByUuid\UserGetByUuidCommand;
use App\Application\User\Update\UserUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * RoleController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createUser(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new UserCreateCommand($newReq->uuid,
                                                        $newReq->nickName,
                                                        $newReq->surName,
                                                        $newReq->photo,
                                                        $newReq->telephone,
                                                        $newReq->email,
                                                        $newReq->password,
                                                        $newReq->nif,
                                                        $newReq->employeeCode,
                                                        $newReq->departmentId,
                                                        $newReq->genderName)
        );

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function updateUser(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new UserUpdateCommand($newReq->uuid,
                                                        $newReq->nickName,
                                                        $newReq->surName,
                                                        $newReq->photo,
                                                        $newReq->telephone,
                                                        $newReq->email,
                                                        $newReq->password,
                                                        $newReq->nif,
                                                        $newReq->employeeCode,
                                                        $newReq->departmentId,
                                                        $newReq->genderName)
        );

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function deleteUser(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new UserDeleteCommand($newReq->id));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function oneUser(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new UserGetByUuidCommand($request->query->get('uuid'))), MyOwnHttpCodes::HTTP_OK);
    }

    public function filterUser(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new UserGetByUuidCommand($request->query->get('uuid'))), MyOwnHttpCodes::HTTP_OK);
    }
}