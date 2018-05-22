<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 14:10
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\User;

class UserSetAllParamsService
{
    static function execute(User $oldUser, User $newUser)
    {
        $oldUser->setNickName($newUser->getNickName());
        $oldUser->setPasswordHashed($newUser->getPassword());
        $oldUser->setTelephone($newUser->getTelephone());
        $oldUser->setPhoto($newUser->getPhoto());
        $oldUser->setEmail($newUser->getEmail());
        $oldUser->setEmployeeCode($newUser->getEmployeeCode());
        $oldUser->setGender($newUser->getGender());
        $oldUser->setNameSurname($newUser->getNameSurname());
        $oldUser->setNif($newUser->getNif());
        $oldUser->setDepartmentID($newUser->getDepartmentID());
    }
}