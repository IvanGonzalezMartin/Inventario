<?php

namespace App\Infrastructure\Model\ClotheDoctrineRepository;

use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use Doctrine\ORM\EntityRepository;


class ClotheDoctrineRepository extends EntityRepository implements ClotheRepository
{

    /**
     * @param Clothe
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(Clothe $clothe): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($clothe);
        $entityManager->flush();
    }
}