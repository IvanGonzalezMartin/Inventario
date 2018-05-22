<?php

namespace App\Infrastructure\Controller;

use App\Application\Manager\GetAll\ManagerGetAllCommand;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Application\ParentDepartment\Delete\ParentDepartmentDeleteCommand;
use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllCommand;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentDepartmentController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ParentDepartmentController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
       $this->commandBus = $commandBus;
    }

    public function createParentDepartment(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ParentDepartmentCreateCommand($newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateParentDepartment(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ParentDepartmentUpdateCommand($newReq->id, $newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function deleteParentDepartment(Request $request)
    {
         $newReq = json_decode($request->getContent());

         $this->commandBus->handle(new ParentDepartmentDeleteCommand($newReq->id));

         return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function getAllParentDepartment()
    {
        return new JsonResponse($this->commandBus->handle(new ParentDepartmentGetAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}