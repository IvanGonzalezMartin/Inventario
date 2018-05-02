<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:56
 */

namespace App\Infrastructure\Controller;


use App\Application\ParentDepartment\Create\ParentDepartmentCreate;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParentDepartamentController
{
    private $parentDepartmentCreator;

    public function __construct(ParentDepartmentCreate $parentDepartmentCreator)
    {
        $this->parentDepartmentCreator = $parentDepartmentCreator;
    }

    public function CreateParentDepartment(Request $request)
    {
        $roleCreateCommand = new ParentDepartmentCreateCommand('BBB');
        $this->parentDepartmentCreator->handler($roleCreateCommand);
        return new JsonResponse([],200);
    }
}