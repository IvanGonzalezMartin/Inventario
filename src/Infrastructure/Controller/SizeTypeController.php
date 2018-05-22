<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:16
 */

namespace App\Infrastructure\Controller;

use App\Application\SizeType\AllSizeType\SizeTypeAllCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;

class SizeTypeController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * SizeTypeController constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @return JsonResponse
     */
    public function all()
    {
        return new JsonResponse($this->commandBus->handle(new SizeTypeAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}