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
<<<<<<< HEAD
     * @ORM\Column(type="boolean" ,options={"default":true})
=======
     * @ORM\Column(type="boolean")
>>>>>>> Entity
     */
    private $active;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string" ,length=255)
=======
     * @ORM\Column(type="string", nullable=false)
>>>>>>> Entity
     */
    private $email;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string" ,length=255)
     */
    private $adminPhoto;
=======
     * @ORM\Column(type="string")
     */
    private $photo;
>>>>>>> Entity

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
<<<<<<< HEAD
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
=======
>>>>>>> Entity
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
<<<<<<< HEAD
    public function setName($name)
=======
    public function setName($name): void
>>>>>>> Entity
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
<<<<<<< HEAD
    public function setRole($role)
=======
    public function setRole($role): void
>>>>>>> Entity
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
<<<<<<< HEAD
    public function setPassword($password)
=======
    public function setPassword($password): void
>>>>>>> Entity
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
<<<<<<< HEAD
    public function setActive($active)
=======
    public function setActive($active): void
>>>>>>> Entity
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
<<<<<<< HEAD
    public function setEmail($email)
=======
    public function setEmail($email): void
>>>>>>> Entity
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
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
=======
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
>>>>>>> Entity
    }

}