<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 10:03
 */

namespace App\Domain\Entity\OrderEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\OrderRepository\OrderDoctrineRepository")
 */

class OrderEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(typ)
     */
}