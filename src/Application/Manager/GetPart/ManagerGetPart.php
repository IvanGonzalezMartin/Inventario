<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:35
 */

namespace App\Application\Manager\GetPart;


use App\Domain\Services\Manager\ManagerGetPartService;

class ManagerGetPart
{
    private $managerGetPart;
    private $dataTransform;

    public function __construct(ManagerGetPartService $managerGetPart, ManagerGetPartDataTransform $dataTransform)
    {
        $this->managerGetPart = $managerGetPart;
        $this->dataTransform = $dataTransform;
    }

    public function handle(ManagerGetPartCommand $managerGetPartCommand)
    {
        return $this->dataTransform->transform($this->managerGetPart->__invoke($managerGetPartCommand));
    }
}