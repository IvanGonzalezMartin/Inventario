<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:28
 */

namespace App\Infrastructure\Controller;

use App\Application\Department\Create\DepartmentCreateCommand;
use App\Application\Department\Update\DepartmentUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DepartmentController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * DepartmentController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createDepartment(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new DepartmentCreateCommand($newReq->parentID, $newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateDepartment(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new DepartmentUpdateCommand($newReq->id, $newReq->parentID, $newReq->name));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}