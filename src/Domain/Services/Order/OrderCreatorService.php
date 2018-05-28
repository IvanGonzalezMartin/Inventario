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
use App\Domain\Model\OrderDetails\OrderDetails;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;
use App\Domain\Model\User\Exceptions\UserAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class OrderCreatorService
{
    private $repository;
    private $orderDetailsRepository;
    private $userRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->repository = $orderRepository;
        $this->userRepository = $userRepository;

    }

    public function __invoke(OrderCreateCommand $orderCreateCommand)
    {
       if (empty($this->userRepository->findById($orderCreateCommand->id())))
            throw new UserAlreadyExistsException($orderCreateCommand->id());


       $orderClothe = new OrderClothe($orderCreateCommand->id());

       $this->repository->insert($orderClothe);
       $this->repository->update();

       $orderDetail= new OrderDetails('','');
       foreach ($orderCreateCommand->orders() as $orderDetails){
           $orderDetail->setOrderID($orderCreateCommand->id());
           $orderDetail->setClotheSizeStockID($orderDetails);
           $this->orderDetailsRepository->insert($orderDetail);
           $this->orderDetailsRepository->update();
       }

    }
}