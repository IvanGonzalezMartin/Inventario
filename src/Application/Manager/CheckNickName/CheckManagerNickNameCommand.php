<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:42
 */

namespace App\Application\Manager\CheckNickName;


class CheckManagerNickNameCommand
{
    private $nickName;

    public function __construct(string $nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }


}