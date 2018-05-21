<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:17
 */

namespace App\Infrastructure\Controller;

use App\Application\Role\AllRoles\RoleAllCommand;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoleController
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

    /**
     * @return JsonResponse
     */
    public function all()
    {
        return new JsonResponse($this->commandBus->handle(new RoleAllCommand()),MyOwnHttpCodes::HTTP_OK);
    }
}