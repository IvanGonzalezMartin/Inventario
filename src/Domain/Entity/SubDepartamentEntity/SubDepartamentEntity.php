<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:20
 */

namespace App\Domain\Entity\SubDepartamentEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\SubDepartamentRepository\SubDepartamentDoctrineRepository")
 */
class SubDepartamentEntity
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
    private $departamentId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delete;


}