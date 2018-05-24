<?php

namespace App\Infrastructure\Model\UserDoctrineRepository;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDoctrineRepository extends EntityRepository implements UserRepository
{

    public function findByID($id)
    {
        return $this->findOneBy(['id' => $id, 'deleteID' =>null]);
    }

    public function findByNickName($nickName)
    {
        return $this->findOneBy(['nickName' => $nickName, 'deleteID' =>null]);
    }

    public function findByEmail($email)
    {
        return $this->findOneBy(['email' => $email, 'deleteID' =>null]);
    }

    public function findByNif($nif)
    {
        return $this->findOneBy(['nif' => $nif, 'deleteID' =>null]);
    }

    public function findByEmployeeCode($employeeCode)
    {
        return $this->findOneBy(['employeeCode' => $employeeCode, 'deleteID' =>null]);
    }

    /**
     * @param User $user
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(User $user)
    {
        $this->getEntityManager()->persist($user);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param $name
     * @param $codEmployee
     * @param $department
     * @param $parentDepartment
     * @param $page
     * @param $usersPerPage
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function filter($name, $codEmployee, $department, $parentDepartment, $page, $usersPerPage)
    {
        return $this->givMeResult($name, $codEmployee, $department, $parentDepartment, $page, $usersPerPage);
    }

    /**
     * @param $name
     * @param $codEmployee
     * @param $department
     * @param $parentDepartment
     * @param $page
     * @param $usersPerPage
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    private function givMeResult($name, $codEmployee, $department, $parentDepartment, $page, $usersPerPage)
    {
        $name = '%'. $name. '%';
        $codEmployee = '%'. $codEmployee .'%';

        switch (true){

            case $department !== '':
                $result = $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('users')
                        ->from('App:User\User', 'users')
                        ->where('users.departmentID = :department')
                        ->andWhere('users.nameSurname LIKE :name')
                        ->andWhere('users.employeeCode LIKE :codEmployee')
                        ->andWhere('users.deleteID IS NULL')
                        ->setMaxResults($usersPerPage)
                        ->setFirstResult($page)
                        ->setParameter('department', $department)
                        ->setParameter('name', $name)
                        ->setParameter('codEmployee', $codEmployee)
                        ->getQuery()
                        ->execute();
                break;

            case $parentDepartment !== '':
//                $sql = "SELECT * FROM user U LEFT JOIN department D on U.department_id = D.id WHERE U.name_surname LIKE '". $name ."' AND U.employee_code LIKE '". $codEmployee ."' AND D.parent_department_id = ". $parentDepartment ." AND U.delete_id IS NULL LIMIT ". $usersPerPage ." OFFSET ". $page;
//                $em = $this->getEntityManager();
//                $stmt = $em->getConnection()->prepare($sql);
//                $stmt->execute();
//                $result = $stmt->fetchAll();
                try {
                    $result = $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('users')
                        ->from('App:User\User', 'users')
                        ->innerJoin('users.departmentID', 'dep')
                        ->andWhere('dep.parentDepartmentID = :parentDepartment')
                        ->andWhere('users.nameSurname LIKE :name')
                        ->andWhere('users.employeeCode LIKE :codEmployee')
                        ->andWhere('users.deleteID IS NULL')
                        ->setMaxResults($usersPerPage)
                        ->setFirstResult($page)
                        ->setParameter('name', $name)
                        ->setParameter('codEmployee', $codEmployee)
                        ->setParameter('parentDepartment', $parentDepartment)
                        ->getQuery()
                        ->execute();
                }catch (\Exception $e){
                    dump($e);
                }
                break;

            default:
                $result =  $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('users')
                        ->from('App:User\User', 'users')
                        ->andWhere('users.nameSurname LIKE :name')
                        ->andWhere('users.employeeCode LIKE :codEmployee')
                        ->andWhere('users.deleteID IS NULL')
                        ->setMaxResults($usersPerPage)
                        ->setFirstResult($page)
                        ->setParameter('name', $name)
                        ->setParameter('codEmployee', $codEmployee)
                        ->getQuery()
                        ->execute();
                break;
        }

        return $result;
    }
}
