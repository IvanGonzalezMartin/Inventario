<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:09
 */

namespace App\Domain\Services\Order;


use App\Application\Order\Delete\OrderClotheDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Order\Exceptions\OrderDosentExistsException;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\OrderDetails\OrderDetailsDeletorService;
use Ramsey\Uuid\Uuid;


class OrderClotheDeletorService
{
    private $repository;
    private $deleteThingRepository;
    private $userRepository;
    private $orderDetailsDeletorService;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, DeleteThingRepository $deleteThingRepository, OrderDetailsDeletorService $orderDetailsDeletorService)
    {
        $this->repository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->deleteThingRepository = $deleteThingRepository;
        $this->orderDetailsDeletorService = $orderDetailsDeletorService;
    }

    public function __invoke(OrderClotheDeleteCommand $orderClotheDeleteCommand)
    {
        $oldOrder = $this->repository->findById($orderClotheDeleteCommand->id());

        if (empty($oldOrder))
            throw new OrderDosentExistsException($orderClotheDeleteCommand->id());

        $uuid = Uuid::uuid4();

        $this->deleteThingRepository->insert(new DeleteThing('Varios', $uuid, 'Order and Order Details'));

        $oldOrder->setDeleteID($uuid);

        $this->repository->update();

        $this->orderDetailsDeletorService->execute($orderClotheDeleteCommand, $uuid);
    }
}