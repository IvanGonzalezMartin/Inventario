<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:57
 */

namespace App\Infrastructure\Controller;


use App\Application\Gender\AllGenders\GenderAllCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;

class GenderController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * GenderController constructor.
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
        return new JsonResponse($this->commandBus->handle(new GenderAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}