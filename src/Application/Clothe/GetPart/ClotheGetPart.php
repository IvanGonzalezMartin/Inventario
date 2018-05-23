<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:32
 */

namespace App\Application\Clothe\GetPart;

use App\Domain\Services\Clothe\ClotheGetPartService;

class ClotheGetPart
{
    private $clotheGetPartService;
    private $dataTransform;

    public function __construct(ClotheGetPartService $clotheGetPartService, ClotheGetPartDataTransform $dataTransform)
    {
        $this->clotheGetPartService = $clotheGetPartService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(ClotheGetPartCommand $clotheGetPartCommand)
    {
        return $this->dataTransform->transform($this->clotheGetPartService->__invoke($clotheGetPartCommand));
    }
}