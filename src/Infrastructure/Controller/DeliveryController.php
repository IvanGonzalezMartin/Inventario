<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:39
 */

namespace App\Infrastructure\Controller;


use App\Application\Delivery\Create\DeliveryCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DeliveryController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ContractController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function createDelivery(Request $request)
    {
        //$newReq = json_decode($request->getContent());

        $this->commandBus->handle(new DeliveryCreateCommand($request->query->get('orderID'),
                                                            $request->query->get('managerID'),
                                                            $request->query->get('docSing')));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }
}