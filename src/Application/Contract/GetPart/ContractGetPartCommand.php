<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 11:20
 */

namespace App\Application\Contract\GetPart;


class ContractGetPartCommand
{
    private $userID;

    /**
     * ContractGetPartCommand constructor.
     * @param $userID
     */
    public function __construct($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function userID()
    {
        return $this->userID;
    }
}