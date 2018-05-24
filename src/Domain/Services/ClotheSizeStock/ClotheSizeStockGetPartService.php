<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:36
 */

namespace App\Domain\Services\ClotheSizeStock;


use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartCommand;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;

class ClotheSizeStockGetPartService
{
    /**
     * @var ClotheSizeStockRepository
     */
    private $repository;


    public function __construct(ClotheSizeStockRepository $clotheSizeStockRepository)
    {
        $this->repository = $clotheSizeStockRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(ClotheSizeStockGetPartCommand $clotheSizeStockGetPartCommand)
    {
        return $this->repository->findByClotheId($clotheSizeStockGetPartCommand->id());
    }
}