<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:14
 */

namespace App\Application\ClotheSizeStock\Update;


use App\Domain\Services\ClotheSizeStock\ClotheSizeStockUpdaterService;

class ClotheSizeStockUpdate
{
    private $repository;

    public function __construct(ClotheSizeStockUpdaterService $clotheSizeStockUpdaterService)
    {
        $this->repository = $clotheSizeStockUpdaterService;
    }

    public function handle(ClotheSizeStockUpdateCommand $clotheSizeStockUpdateCommand)
    {
        $this->repository->__invoke($clotheSizeStockUpdateCommand);
    }
}