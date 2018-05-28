<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:06
 */

namespace App\Domain\Services\ClotheSizeStock;


use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdateCommand;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\ClotheSizeStock\Exceptions\ClotheSizeStockWithIdDoesntExistsException;
use App\Domain\Model\ClotheSizeStock\Exceptions\ClotheStockCannotBeNegativeException;

class ClotheSizeStockUpdaterService
{
    private $repository;

    public function __construct(ClotheSizeStockRepository $clotheSizeStockRepository)
    {
        $this->repository = $clotheSizeStockRepository;
    }

    public function __invoke(ClotheSizeStockUpdateCommand $clotheSizeStockUpdateCommand)
    {
        $oldClotheSizeStock = $this->repository->findById($clotheSizeStockUpdateCommand->id());

        if (empty($oldClotheSizeStock))
            throw new ClotheSizeStockWithIdDoesntExistsException($clotheSizeStockUpdateCommand->id());

        if (0 >= $clotheSizeStockUpdateCommand->stock())
            throw new ClotheStockCannotBeNegativeException();



        $oldClotheSizeStock->setStock($clotheSizeStockUpdateCommand->stock());

        $this->repository->updateAll();
    }
}