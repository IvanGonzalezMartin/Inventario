<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:04
 */

namespace App\Infrastructure\Controller;


use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartCommand;
use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheSizeStockController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function updateClotheSizeStock(Request $request)
    {
        $newReq = json_encode($request->getContent());

        $this->commandBus->handle(new ClotheSizeStockUpdateCommand($newReq->id,$newReq->stock));

        return new JsonResponse(null ,MyOwnHttpCodes::HTTP_OK);
    }

    public function getPartClotheSizeStock(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new ClotheSizeStockGetPartCommand($request->query->get('id'))),MyOwnHttpCodes::HTTP_OK);
    }
}