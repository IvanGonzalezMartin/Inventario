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
use App\Application\User\Filter\UserFilterCommand;
use App\Application\User\GetByUuid\UserGetByUuidCommand;
use App\Application\User\LogIn\UserLogInCommand;
use App\Application\User\LogOut\UserLogOutCommand;
use App\Application\User\Update\UserUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use App\MiddelWare\Shared\SaveAndRescueRequest;
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

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function filterUser(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new UserFilterCommand($request->query->get('nameSurname'),
                                                                                $request->query->get('codEmployee'),
                                                                                $request->query->get('department'),
                                                                                $request->query->get('parentDepartment'),
                                                                                $request->query->get('page'),
                                                                                $request->query->get('usersPerPage')
                                                                                )
        ),
            MyOwnHttpCodes::HTTP_OK);
    }

    public function logIn(Request $request)
    {
        $newReq = json_decode($request->getContent());

        return new JsonResponse($this->commandBus->handle(new UserLogInCommand($newReq->anyThing, $newReq->password)),MyOwnHttpCodes::HTTP_OK);
    }

    public function logOut()
    {
        $this->commandBus->handle(new UserLogOutCommand(''));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}