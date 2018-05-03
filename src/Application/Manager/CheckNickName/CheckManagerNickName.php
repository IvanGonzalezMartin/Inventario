<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:42
 */

namespace App\Application\Manager\CheckNickName;


use App\Domain\Services\Manager\CheckNickNameManagerService;

class CheckManagerNickName
{
    private $checkNickName;

    public function __construct(CheckNickNameManagerService $checkNickName)
    {
        $this->checkNickName = $checkNickName;
    }

    public function handler(CheckManagerNickNameCommand $checkManagerNickNameCommand)
    {
        $this->checkNickName->__invoke($checkManagerNickNameCommand->getNickName());
    }
}