<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:39
 */

namespace App\Infrastructure\Controller;


use League\Tactician\CommandBus;

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
}