<?php

namespace App\Infrastructure\Model\RoleDoctrineRepository;

use App\Domain\Model\Role\Role;
use App\Domain\Model\Role\RoleRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Role|null find($id, $lockMode = null, $lockVersion = null)
 * @method Role|null findOneBy(array $criteria, array $orderBy = null)
 * @method Role[]    findAll()
 * @method Role[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleDoctrineRepository extends EntityRepository implements RoleRepository
{
    /**
     * @param Role $article
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(Role $role): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($role);
        $entityManager->flush();
    }

    public function getRolById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateAll(): void
    {
        $this->getEntityManager()->flush();
    }
}
