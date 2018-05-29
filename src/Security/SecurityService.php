<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:12
 */

namespace App\Security;


interface SecurityService
{
    public function execute($request, $command);
}