<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:00
 */

namespace App\Infrastructure\Controller;


use App\Application\Sizes\SizePartCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SizeController
{

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ParentDepartmentController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function getPartOfArray(Request $request)
    {
        $upperCase = strtoupper($request->query->get('type'));

        return new JsonResponse($this->commandBus->handle(new SizePartCommand($upperCase)),MyOwnHttpCodes::HTTP_OK);
    }
}