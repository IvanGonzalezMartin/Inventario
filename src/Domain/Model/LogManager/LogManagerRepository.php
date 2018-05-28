<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:54
 */

namespace App\Domain\Model\LogManager;


interface LogManagerRepository
{
    public function update();
    public function logIn(LogManager $logManager);
    public function findByToken($token);
    public function findByManager($manager);
}