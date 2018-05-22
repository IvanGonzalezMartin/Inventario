<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:49
 */

namespace App\Application\ClotheCategory\Delete;


use App\Domain\Services\ClotheCategory\ClotheCategoryDeletorService;

class ClotheCategoryDelete
{
    private $categoryDeletorService;

    public function __construct(ClotheCategoryDeletorService $categoryDeletorService)
    {
        $this->categoryDeletorService = $categoryDeletorService;
    }

    /**
     * @param ClotheCategoryDeleteCommand $clotheCategoryDeleteCommand
     * @throws \Assert\AssertionFailedException
     */
    public function handle(ClotheCategoryDeleteCommand $clotheCategoryDeleteCommand)
    {
        $this->categoryDeletorService->__invoke($clotheCategoryDeleteCommand);
    }
}