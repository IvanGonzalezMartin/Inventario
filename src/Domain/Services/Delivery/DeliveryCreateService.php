<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:56
 */

namespace App\Domain\Services\Delivery;

use App\Application\Delivery\Create\DeliveryCreateCommand;
use App\Domain\Model\Delivery\Delivery;
use App\Domain\Model\Delivery\DeliveryRepository;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Order\Exceptions\OrderAlreadyDeliveredException;
use App\Domain\Model\Order\Exceptions\OrderDosentExistsException;
use App\Domain\Model\Order\OrderRepository;
use Ramsey\Uuid\Uuid;

class DeliveryCreateService
{
    private $repository;
    private $orderRepository;
    private $managerRepository;

    public function __construct(DeliveryRepository $deliveryRepository, OrderRepository $orderRepository, ManagerRepository $managerRepository)
    {
        $this->repository = $deliveryRepository;
        $this->orderRepository = $orderRepository;
        $this->managerRepository = $managerRepository;
    }

    public function __invoke(DeliveryCreateCommand $deliveryCreateCommand)
    {

        if (empty($this->managerRepository->findById($deliveryCreateCommand->getManagerID())))
            throw new ManagerWithIdDoesntExistsException($deliveryCreateCommand->getManagerID());

        if (empty($this->orderRepository->findById($deliveryCreateCommand->getOrderID())))
            throw new OrderDosentExistsException($deliveryCreateCommand->getOrderID());

        $orderObject = $this->orderRepository->findByIdWhitNotDelivery($deliveryCreateCommand->getOrderID());

        if (empty($orderObject))
            throw new OrderAlreadyDeliveredException($deliveryCreateCommand->getOrderID());

        $uuid = Uuid::uuid4();

        $delivery = new Delivery($uuid, $deliveryCreateCommand->getOrderID(), $deliveryCreateCommand->getManagerID(), $deliveryCreateCommand->getDocSing());

        $this->repository->insert($delivery);

        $orderObject->setDeliveryId($uuid);

        $this->repository->update();


    }
}