<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 8:20
 */

namespace App\Domain\Services\ClotheCategory;


use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;

class ClotheCategoryGetAllService
{
    /**
     * @var ClotheCategoryRepository
     */
    private $repository;


    public function __construct(ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->repository = $clotheCategoryRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this->repository->getAll();
    }
}