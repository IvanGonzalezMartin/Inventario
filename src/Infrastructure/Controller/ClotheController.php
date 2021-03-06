<?php

namespace App\Infrastructure\Controller;

use App\Application\Clothe\Creator\ClotheCreateCommand;
use App\Application\Clothe\Delete\ClotheDeleteCommand;
use App\Application\Clothe\GetPart\ClotheGetPartCommand;
use App\Application\Clothe\Update\ClotheUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ClotheController
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

    public function createClothe(Request $request)
    {
        $newReq = json_encode($request->getContent());

        $this->commandBus->handle(new ClotheCreateCommand($newReq->id,
                                                    $newReq->clotheCategoryID,
                                                    $newReq->name,
                                                    $newReq->gender,
                                                    $newReq->photo,
                                                    $newReq->description));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateClothe(Request $request)
    {
        $newReq = json_encode($request->getContent());

        $this->commandBus->handle(new ClotheUpdateCommand( $newReq->id,
                                                        $newReq->clotheCategoryID,
                                                        $newReq->name,
                                                        $newReq->gender,
                                                        $newReq->photo,
                                                        $newReq->description));


        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function deleteClothe(Request $request)
    {
        $newReq = json_encode($request->getContent());

        $this->commandBus->handle(new ClotheDeleteCommand($newReq->id));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function getAll(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new ClotheGetPartCommand($request->query->get('id'))),MyOwnHttpCodes::HTTP_OK);
    }
}