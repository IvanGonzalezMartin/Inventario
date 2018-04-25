<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 11:26
 */

namespace App\Domain\Entity\OrderDetailsEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\OrderDetailsRepository\OrderDetailsDoctrineRepository")
 */
class OrderDetailsEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $sizeId;

    /**
     * @ORM\Column(type="integer")
     */
    private $clotheSizeStockId;
}