<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:52
 */

namespace App\Application\Manager\Create;


use App\Domain\Services\Manager\ManagerCreatorService;

class ManagerCreate
{
    private $managerCreatorService;

    public function __construct(ManagerCreatorService $managerCreatorService)
    {
        $this->managerCreatorService = $managerCreatorService;
    }

    public function handler(ManagerCreateCommand $managerCreateCommand)
    {

        $this->managerCreatorService->__invoke(new Manager());
    }
}