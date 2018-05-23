<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 8:16
 */

namespace App\Application\ClotheCategory\GetAll;


use App\Domain\Services\ClotheCategory\ClotheCategoryGetAllService;

class ClotheCategoryAll
{
    private $clotheCategoryGetAllService;
    private $dataTransform;

    public function __construct(ClotheCategoryGetAllService $clotheCategoryGetAllService, ClotheCategoryAllDataTransform $dataTransform)
    {
        $this->clotheCategoryGetAllService = $clotheCategoryGetAllService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(ClotheCategoryAllCommand $clotheCategoryAllCommand)
    {
        return $this->dataTransform->transform($this->clotheCategoryGetAllService->__invoke());
    }
}