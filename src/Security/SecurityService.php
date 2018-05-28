<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:12
 */

namespace App\Security;


use Symfony\Component\HttpFoundation\Request;

interface SecurityService
{
    public function execute(Request $request, $command);
}