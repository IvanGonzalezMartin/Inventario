<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:53
 */

namespace App\Application\Manager\Create;


use Assert\Assertion;

class ManagerCreateCommand
{
    private $id;
    private $nickName;
    private $name;
    private $photo;
    private $rolID;
    private $password;
    private $email;

    /**
     * ManagerCreateCommand constructor.
     * @param $id
     * @param $nickName
     * @param $name
     * @param $photo
     * @param $rolID
     * @param $password
     * @param $email
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $nickName, $name, $photo, $rolID, $password, $email)
    {
        Assertion::notNull($id);
        Assertion::email($email);
        Assertion::string($name);

        $this->id = $id;
        $this->nickName = $nickName;
        $this->name = $name;
        $this->photo = $photo;
        $this->rolID = $rolID;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function nickName()
    {
        return $this->nickName;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function photo()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function rolID()
    {
        return $this->rolID;
    }

    /**
     * @return mixed
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
    }

}