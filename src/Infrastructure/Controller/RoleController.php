<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:17
 */

namespace App\Infrastructure\Controller;


use App\Application\Role\AllRoles\RoleAll;
use App\Application\Role\AllRoles\RoleAllCommand;
use App\Application\Role\Create\RoleCreate;
use App\Application\Role\Create\RoleCreateCommand;
use App\Application\Role\Update\RoleUpdate;
use App\Application\Role\Update\RoleUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RoleController
{
    private $roleCreate;
    private $roleUpdate;
    private $roleAll;

    public function __construct(RoleCreate $roleCreate, RoleUpdate $roleUpdate, RoleAll $rolesAll)
    {
        $this->roleCreate = $roleCreate;
        $this->roleUpdate = $roleUpdate;
        $this->roleAll = $rolesAll;
    }

    public function createRole(Request $request)
    {
        $name = $request->query->get('name');
        $description = $request->query->get('description');
        $roleCreateCommand = new RoleCreateCommand($name, $description);
        $this->roleCreate->handler($roleCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }

    public function updateRole(Request $request)
    {
        $rolID = $request->query->get('rolID');
        $name = $request->query->get('name');
        $description = $request->query->get('description');

        $roleUpdateCommand = new RoleUpdateCommand($rolID, $name, $description);
        $this->roleUpdate->handler($roleUpdateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }

    public function all()
    {
       $roles = $this->roleAll->handler(new RoleAllCommand());

        return new JsonResponse($roles,MyOwnHttpCodes::HTTP_OK);
    }


}