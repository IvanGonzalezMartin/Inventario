<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:08
 */

namespace App\Application\Sizes;


use App\Domain\Services\Size\SizePartService;

class SizePart
{
    private $partService;
    private $dataTransform;

    public function __construct(SizePartService $partService, SizePartDataTransform $dataTransform)
    {
        $this->partService = $partService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(SizePartCommand $sizePartCommand)
    {
        return $this->dataTransform->transform($this->partService->__invoke($sizePartCommand->getName()));
    }
}