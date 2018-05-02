<?php

namespace App\Infrastructure\Controller;

use App\Application\Role\Create\RoleCreate;
use App\Application\Role\Create\RoleCreateCommand;
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
        $roleCreateCommand = new RoleCreateCommand('AAA','sdfdsf');
        $this->roleCreate->handler($roleCreateCommand);
        return new JsonResponse([],200);
    }
}