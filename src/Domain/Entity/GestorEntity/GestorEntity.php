<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 9:48
 */

namespace App\Domain\Entity\GestorEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Entity\GestorRepository\GestorDoctrineRepository")
 */
class GestorEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false ,options={"default":0})
     */
    private $role;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean" ,options={"default":true})
     */
    private $active;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string" ,length=255)
     */
    private $adminPhoto;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdminPhoto()
    {
        return $this->adminPhoto;
    }

    /**
     * @param mixed $adminPhoto
     */
    public function setAdminPhoto($adminPhoto)
    {
        $this->adminPhoto = $adminPhoto;
    }

}