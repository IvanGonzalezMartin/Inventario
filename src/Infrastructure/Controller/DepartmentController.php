<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:28
 */

namespace App\Infrastructure\Controller;

use App\Application\Department\Create\DepartmentCreate;
use App\Application\Department\Create\DepartmentCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DepartmentController
{
    private $departmentCreate;

    public function __construct(DepartmentCreate $departmentCreate)
    {
        $this->departmentCreate = $departmentCreate;
    }

    public function createDepartment(Request $request)
    {
        $parentID = $request->query->get('parentID');
        $name = $request->query->get('name');
        $departmentCreateCommand = new DepartmentCreateCommand($parentID , $name);
        $this->departmentCreate->handler($departmentCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}