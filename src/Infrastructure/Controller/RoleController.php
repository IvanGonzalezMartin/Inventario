<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:17
 */

namespace App\Infrastructure\Controller;


use App\Application\Role\AllRoles\RoleAllCommand;
use App\Application\Role\Create\RoleCreateCommand;
use App\Application\Role\Update\RoleUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RoleController
{
    public function createRole(Request $request, CommandBus $commandBus)
    {
        $roleCreateCommand = new RoleCreateCommand($request->query->get('name'), $request->query->get('description'));

        return new JsonResponse($commandBus->handle($roleCreateCommand),MyOwnHttpCodes::HTTP_OK);
    }

    public function updateRole(Request $request, CommandBus $commandBus)
    {
        $roleUpdateCommand = new RoleUpdateCommand( $request->query->get('rolID'),
                                                    $request->query->get('name'),
                                                    $request->query->get('description'));

        return new JsonResponse($commandBus->handle($roleUpdateCommand),MyOwnHttpCodes::HTTP_OK);
    }

    public function all (CommandBus $commandBus)
    {
        return new JsonResponse($commandBus->handle(new RoleAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}