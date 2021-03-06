<?php

namespace App\Infrastructure\Model\OrderDoctrineRepository;

use App\Domain\Model\Order\OrderClothe;
use App\Domain\Model\Order\OrderRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method OrderClothe|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderClothe|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderClothe[]    findAll()
 * @method OrderClothe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderDoctrineRepository extends EntityRepository implements OrderRepository
{
    public function findById($id)
    {
        return $this->findOneBy(['id' => $id , 'deleteID' => null]);
    }

    public function findByIdWhitNotDelivery($id)
    {
        return $this->findOneBy(['id' => $id , 'deliveryID' => null, 'deleteID' => null]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(): void
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param Manager $manager
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(OrderClothe $orderClothe)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($orderClothe);
    }

    public function findAllById($id)
    {
        return $this->findBy(['id' => $id , 'deleteID' => null]);
    }

    public function filter($pages, $maxOrder)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('orderA')
            ->from('App:Order\OrderClothe', 'orderA')
            ->setMaxResults($maxOrder)
            ->setFirstResult($pages)
            ->getQuery()
            ->execute();
    }

    public function filterByUserId($id, $maxOrder, $pages)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('orderA')
            ->from('App:Order\OrderClothe', 'orderA')
            ->where('orderA.userID = :userID')
            ->andWhere('orderA.deleteID IS NULL')
            ->setMaxResults($maxOrder)
            ->setFirstResult($pages)
            ->setParameter('userID', $id)
            ->getQuery()
            ->execute();
    }
}
