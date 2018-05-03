<?php

namespace App\Infrastructure\Controller;

use App\Application\ParentDepartment\Create\ParentDepartmentCreate;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentDepartmentController
{
    private $parentDepartmentCreate;

    public function __construct(ParentDepartmentCreate $parentDepartmentCreate)
    {
        $this->parentDepartmentCreate = $parentDepartmentCreate;
    }

    public function createParentDepartment(Request $request)
    {
        $name = $request->query->get('name');
        $departmentCreateCommand = new ParentDepartmentCreateCommand($name);
        $this->parentDepartmentCreate->handler($departmentCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}