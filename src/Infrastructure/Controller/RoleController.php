<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:17
 */

namespace App\Infrastructure\Controller;


use App\Application\Role\Create\RoleCreate;
use App\Application\Role\Create\RoleCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RoleController
{
    private $roleCreate;
    public function __construct(RoleCreate $roleCreate)
    {
        $this->roleCreate = $roleCreate;
    }

    public function createRole(Request $request)
    {
        $name = $request->query->get('name');
        $description = $request->query->get('description');
        $roleCreateCommand = new RoleCreateCommand($name, $description);

        $this->roleCreate->handler($roleCreateCommand);
        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}