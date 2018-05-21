<?php

namespace App\Domain\Model\Role;

class Role
{
    const ADMIN = 'ADMIN';
    const CURRENT = 'CURRENT';

    const ROLES = [
        'ADMIN' => self::ADMIN,
        'CURRENT' => self::CURRENT
    ];
}
