<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 13:00
 */

namespace App\Infrastructure\Controller;


use App\Application\ClotheCategory\Create\ClotheCategoryCreate;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdate;
use App\Application\ClotheCategory\Create\ClotheCategoryCreateCommand;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheCategoryController
{
    private $clotheCategoryCreator;
    private $clotheCategoryUpdate;

    /**
     * ClotheCategoryController constructor.
     * @param $clotheCategoryCreator
     */
    public function __construct(ClotheCategoryCreate $clotheCategoryCreator, ClotheCategoryUpdate $clotheCategoryUpdate)
    {
        $this->clotheCategoryCreator = $clotheCategoryCreator;
        $this->clotheCategoryUpdate = $clotheCategoryUpdate;
    }

    public function createClotheCategory(Request $request)
    {

        $name = $request->query->get('name');
        $typeSizeName = $request->query->get('sizeName');

        $clotheCategoryCreateCommand = new ClotheCategoryCreateCommand($name, $typeSizeName);
        $this->clotheCategoryCreator->handler($clotheCategoryCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClotheCategory(Request $request)
    {
        $id = $request->query->get('id');
        $name = $request->query->get('name');

        $clotheCategoryUpdateCommand = new ClotheCategoryUpdateCommand($id ,$name);
        $this->clotheCategoryUpdate->handler($clotheCategoryUpdateCommand);

        return new JsonResponse([], MyOwnHttpCodes::HTTP_OK);
    }
}