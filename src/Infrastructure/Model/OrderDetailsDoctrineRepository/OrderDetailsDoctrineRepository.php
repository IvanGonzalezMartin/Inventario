<?php

namespace App\Infrastructure\Model\OrderDetailsDoctrineRepository;

use App\Domain\Model\OrderDetails\OrderDetails;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method OrderDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderDetails[]    findAll()
 * @method OrderDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderDetailsDoctrineRepository extends EntityRepository implements OrderDetailsRepository
{
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(): void
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param OrderDetails $orderDetails
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(OrderDetails $orderDetails)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($orderDetails);
    }

    public function givMeAllOrderDetailsById($orderID)
    {
        return $this->findBy(['orderID' => $orderID, 'deleteID' => null]);
    }
}
