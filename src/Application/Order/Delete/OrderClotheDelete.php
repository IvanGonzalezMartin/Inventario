<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:08
 */

namespace App\Application\Order\Delete;


use App\Domain\Services\Order\OrderClotheDeletorService;

class OrderClotheDelete
{
    private $orderClotheDeletorService;

    public function __construct(OrderClotheDeletorService $orderClotheDeletorService)
    {
        $this->orderClotheDeletorService = $orderClotheDeletorService;
    }

    public function handle(OrderClotheDeleteCommand $orderClotheDeleteCommand)
    {
        $this->orderClotheDeletorService->__invoke($orderClotheDeleteCommand);
    }
}