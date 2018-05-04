<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:42
 */

namespace App\Application\Manager\CheckNickName;


use App\Domain\Services\Manager\ManagerCheckNickNameService;

class ManagerCheckNickName
{
    private $checkNickName;

    public function __construct(ManagerCheckNickNameService $checkNickName)
    {
        $this->checkNickName = $checkNickName;
    }

    public function handler(ManagerCheckNickNameCommand $checkManagerNickNameCommand)
    {
        $namef = "sdfdsf";
        $has = password_hash($namef, PASSWORD_DEFAULT);
        $has1 = '$2y$10$cJ9aVl5TakIuIVl.f5H8OuxhxOmtrOKtK5DKiTLhUWwtsFOWygVwK';
        $has2 = '$2y$10$X10BGaf/4Y/bmHAWM2iQkevB5X/siBrxTB2Ngj6BYjBaeG4Ub6Pg6';
        $has3 = '$2y$10$X10BGaf/4Y/bmHAWM2iQkevB5X/siBrxTB2Ngj6BYjBaeG4Ub7Pg6';
        dump(password_verify ( $namef, $has));
        dump(password_verify ( $namef, $has1));
        dump(password_verify ( $namef, $has2));
        dump(password_verify ( $namef, $has3));
        dump($has);
        dump($namef);

        die;
        $this->checkNickName->__invoke($checkManagerNickNameCommand->getNickName());
    }
}