<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:02
 */

namespace App\Infrastructure\Controller;


use App\Application\Contract\Create\ContractCreate;
use App\Application\Contract\Create\ContractCreateCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContractController
{
    private $contractCreator;

    public function __construct(ContractCreate $contractCreator)
    {
        $this->contractCreator = $contractCreator;
    }

    public function createContract(Request $request)
    {

        $id = $request->query->get('id');
        $endDate = $request->query->get('endDate');
        $renovation = $request->query->get('renovation');

        $contractCreateCommand = new ContractCreateCommand($id, $endDate, $renovation);
        $this->contractCreator->handler($contractCreateCommand);

        return new JsonResponse([],MyOwnHttpCodes::HTTP_OK);
    }
}