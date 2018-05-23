<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 13:00
 */

namespace App\Infrastructure\Controller;

use App\Application\ClotheCategory\Create\ClotheCategoryCreateCommand;
use App\Application\ClotheCategory\Delete\ClotheCategoryDeleteCommand;
use App\Application\ClotheCategory\GetAll\ClotheCategoryAllCommand;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheCategoryController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ClotheController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createClotheCategory(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ClotheCategoryCreateCommand($newReq->name, $newReq->typeSizeName));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClotheCategory(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ClotheCategoryUpdateCommand($newReq->id, $newReq->name));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function deleteClotheCategory(Request $request)
    {
        $this->commandBus->handle(new ClotheCategoryDeleteCommand($request->query->get('id')));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function all()
    {
        return new JsonResponse($this->commandBus->handle(new ClotheCategoryAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}