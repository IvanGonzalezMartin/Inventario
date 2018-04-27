<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:59
 */

namespace App\Domain\Model\Role;


interface RoleRepository
{
    public function insert(Role $role): void;
}