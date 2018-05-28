<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 10:12
 */

namespace App\Infrastructure\Controller;

use App\Application\Order\Create\OrderCreateCommand;
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
        $array = json_decode($request->query->get('orders'))->order;

        $this->commandBus->handle(new OrderCreateCommand($request->query->get('userId'), $array));

        return new JsonResponse(null, MyOwnHttpCodes::HTTP_OK);
    }
}