<?php

namespace App\Infrastructure\Model\DeliveryDoctrineRepository;

use App\Domain\Model\Delivery\Delivery;
use App\Domain\Model\Delivery\DeliveryRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Delivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Delivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Delivery[]    findAll()
 * @method Delivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryDoctrineRepository extends EntityRepository implements DeliveryRepository
{

    /**
     * @param Delivery $delivery
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(delivery $delivery)
    {
        $this->getEntityManager()->persist($delivery);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->getEntityManager()->flush();
    }

    public function findByOrder($orderID)
    {
        // TODO: Implement findByOrder() method.
    }

    public function findByManagerID($managerID)
    {
        // TODO: Implement findByManagerID() method.
    }
}
