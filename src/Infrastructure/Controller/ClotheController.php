<?php

namespace App\Infrastructure\Controller;

use App\Application\Clothe\Creator\ClotheCreateCommand;
use App\Application\Clothe\Update\ClotheUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheController
{
    public function createClothe(Request $request, CommandBus $commandBus)
    {
        $newReq = json_encode($request->getContent());

        $commandBus->handle(new ClotheCreateCommand($newReq->id,
                                                    $newReq->clotheCategoryID,
                                                    $newReq->name,
                                                    $newReq->gender,
                                                    $newReq->photo,
                                                    $newReq->description));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClothe(Request $request, CommandBus $commandBus)
    {
        $newReq = json_encode($request->getContent());

        $commandBus->handle(new ClotheUpdateCommand( $newReq->id,
                                                        $newReq->clotheCategoryID,
                                                        $newReq->name,
                                                        $newReq->gender,
                                                        $newReq->photo,
                                                        $newReq->description));


        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }
}