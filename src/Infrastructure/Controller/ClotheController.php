<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 12:12
 */

namespace App\Infrastructure\Controller;


use App\Application\Clothe\Creator\ClotheCreate;
use App\Application\Clothe\Creator\ClotheCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheController
{
    private $clotheCreate;

    public function __construct(ClotheCreate $clotheCreate)
    {
        $this->clotheCreate = $clotheCreate;
    }

    public function createClothe(Request $request)
    {
        $id = $request->query->get('id');
        $clotheCategoryID = $request->query->get('clotheCategory');
        $name = $request->query->get('name');
        $gender = $request->query->get('gender');

        $clotheCreateCommand = new ClotheCreateCommand($id,$clotheCategoryID,$name,$gender);
        $this->clotheCreate->handler($clotheCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}