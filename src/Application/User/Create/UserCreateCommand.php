<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:01
 */

namespace App\Application\User\Create;


class UserCreateCommand
{
    private $uuid;
    private $nickName;
    private $surName;
    private $photo;
    private $telephone;
    private $email;
    private $password;
    private $nif;
    private $employeeCode;
    private $departmentId;
    private $genderName;

    /**
     * UserCreateCommand constructor.
     * @param $uuid
     * @param $nickName
     * @param $surName
     * @param $photo
     * @param $telephone
     * @param $email
     * @param $password
     * @param $nif
     * @param $employeeCode
     * @param $departmentId
     * @param $genderName
     */
    public function __construct($uuid, $nickName, $surName, $photo, $telephone, $email, $password, $nif, $employeeCode, $departmentId, $genderName)
    {
        $this->uuid = $uuid;
        $this->nickName = $nickName;
        $this->surName = $surName;
        $this->photo = $photo;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->password = $password;
        $this->nif = $nif;
        $this->employeeCode = $employeeCode;
        $this->departmentId = $departmentId;
        $this->genderName = $genderName;
    }

    /**
     * @return mixed
     */
    public function uuid()
    {
        return $this->uuid;
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
    public function surName()
    {
        return $this->surName;
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
    public function telephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function email()
    {
        return $this->email;
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
    public function nif()
    {
        return $this->nif;
    }

    /**
     * @return mixed
     */
    public function employeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * @return mixed
     */
    public function departmentId()
    {
        return $this->departmentId;
    }

    /**
     * @return mixed
     */
    public function genderName()
    {
        return $this->genderName;
    }

}