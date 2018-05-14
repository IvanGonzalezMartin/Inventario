<?php

namespace App\Infrastructure\Controller;

use App\Application\ParentDepartment\Create\ParentDepartmentCreate;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdate;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentDepartmentController
{
    private $parentDepartmentCreate;
    private $parentDepartmentUpdater;

    public function __construct(ParentDepartmentCreate $parentDepartmentCreate, ParentDepartmentUpdate $parentDepartmentUpdater)
    {
        $this->parentDepartmentCreate = $parentDepartmentCreate;
        $this->parentDepartmentUpdater = $parentDepartmentUpdater;
    }

    public function createParentDepartment(Request $request)
    {
        $name = $request->query->get('name');
        $parentDepartmentCreateCommand = new ParentDepartmentCreateCommand($name);
        $this->parentDepartmentCreate->handler($parentDepartmentCreateCommand);

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateParentDepartment(Request $request)
    {

        $name = $request->query->get('name');
        $id = $request->query->get('id');
        $parentDepartmentUpdateCommand = new ParentDepartmentUpdateCommand($name,$id);
        $this->parentDepartmentUpdater->handler($parentDepartmentUpdateCommand);

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}