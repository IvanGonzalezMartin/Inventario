<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 10:47
 */

namespace App\Domain\Services\Order;

use App\Application\Order\Create\OrderCreateCommand;
use App\Domain\Model\Order\OrderClothe;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\OrderDetails\OrderDetailsCreatorService;
use Ramsey\Uuid\Uuid;

class OrderCreatorService
{
    private $repository;
    private $orderDetailsCreator;
    private $userRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, OrderDetailsCreatorService $orderDetailsCreator)
    {
            $this->repository = $orderRepository;
            $this->userRepository = $userRepository;
            $this->orderDetailsCreator = $orderDetailsCreator;
    }

    public function __invoke(OrderCreateCommand $orderCreateCommand)
    {
       if (empty($this->userRepository->findById($orderCreateCommand->id())))
            throw new UserDoesntExistsException($orderCreateCommand->id());

       $uuid = Uuid::uuid4();

       $orderClothe = new OrderClothe($uuid, $orderCreateCommand->id());

       $this->repository->insert($orderClothe);
       $this->repository->update();

       $this->orderDetailsCreator->execute($uuid, $orderCreateCommand);
    }
}