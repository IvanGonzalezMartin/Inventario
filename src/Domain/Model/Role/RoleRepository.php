<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:59
 */

namespace App\Domain\Model\Role;


use Doctrine\Common\Collections\ArrayCollection;

interface RoleRepository
{
    public function insert(Role $role): void;

    /**
     * @param $id
     * @return Role
     */
    public function getRolById($id);
    public function updateAll(): void;
    public function getAll();
}