<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:02
 */

namespace App\Infrastructure\Controller;


use App\Application\Contract\Create\ContractCreateCommand;
use App\Application\Contract\GetPart\ContractGetPartCommand;
use App\Application\Contract\Update\ContractUpdateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContractController
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

    public function createContract(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ContractCreateCommand(  $newReq->id,
                                                        $newReq->endDate,
                                                        $newReq->renovation,
                                                        $newReq->startDate));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function updateContract(Request $request)
    {
        $newReq = json_decode($request->getContent());

        $this->commandBus->handle(new ContractUpdateCommand(  $newReq->id,
                                                        $newReq->endDate,
                                                        $newReq->renovation,
                                                        $newReq->startDate));

        return new JsonResponse(null,MyOwnHttpCodes::HTTP_OK);
    }

    public function getPart(Request $request)
    {
        return new JsonResponse($this->commandBus->handle(new ContractGetPartCommand($request->query->get('userID'))),MyOwnHttpCodes::HTTP_OK);
    }
}