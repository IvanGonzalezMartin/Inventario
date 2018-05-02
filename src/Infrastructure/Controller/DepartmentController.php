<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:01
 */

namespace App\Infrastructure\Controller;


use App\Application\Departament\Create\DepartmentCreate;
use App\Application\Departament\Create\DepartmentCreateCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DepartmentController
{
    private $roleCreate;
    public function __construct(DepartmentCreate $departmentCreate)
    {
        $this->roleCreate = $departmentCreate;
    }

    public function createDepartment(Request $request)
    {
        $departmentCreateCommand = new DepartmentCreateCommand('AAA');
        $this->roleCreate->handler($departmentCreateCommand);
        return new JsonResponse([],200);
    }
}