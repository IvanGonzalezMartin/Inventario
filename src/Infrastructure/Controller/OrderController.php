<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 10:12
 */

namespace App\Infrastructure\Controller;

use App\Application\Order\Create\OrderCreateCommand;
use App\Application\Order\Delete\OrderClotheDeleteCommand;
use App\Application\Order\GetAll\OrderClotheGetAllCommand;
use App\Application\Order\GetByUserID\OrderClotheGetByUserIdCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OrderController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * RoleController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createOrder(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new OrderCreateCommand($newReq->userId, json_decode($newReq->orders)->order));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function deleteOrder(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new OrderClotheDeleteCommand($newReq->id));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }

    public function getAllOrders(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new OrderClotheGetAllCommand($request->query->get('pages'),$request->query->get('OrderPerPage'))), MyOwnHttpCodes::HTTP_OK);
    }

    public function getByUserID(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new OrderClotheGetByUserIdCommand($request->query->get('userID'),$request->query->get('pages'),$request->query->get('OrderPerPage'))), MyOwnHttpCodes::HTTP_OK);
    }
}