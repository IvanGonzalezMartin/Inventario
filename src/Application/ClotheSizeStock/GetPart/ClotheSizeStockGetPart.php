<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:39
 */

namespace App\Application\ClotheSizeStock\GetPart;


use App\Domain\Services\ClotheSizeStock\ClotheSizeStockGetPartService;

class ClotheSizeStockGetPart
{
    private $repository;
    private $dataTransform;

    public function __construct(ClotheSizeStockGetPartService $clotheSizeStockGetPartService, ClotheSizeStockGetPartDataTransform $dataTransform)
    {
        $this->repository = $clotheSizeStockGetPartService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(ClotheSizeStockGetPartCommand $clotheSizeStockGetPartCommand)
    {
        return $this->dataTransform->transform($this->repository->__invoke($clotheSizeStockGetPartCommand));
    }
}