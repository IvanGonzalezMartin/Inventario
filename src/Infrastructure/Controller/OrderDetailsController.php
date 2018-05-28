<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:57
 */

namespace App\Infrastructure\Controller;


use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OrderDetailsController
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

    public function getByOrderID(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new OrderDetailsGetByOrderIdCommand($request->query->get('orderID'))), MyOwnHttpCodes::HTTP_OK);
    }
}