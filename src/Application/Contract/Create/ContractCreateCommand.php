<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 12:14
 */

namespace App\Application\Contract\Create;

class ContractCreateCommand
{
    private $id;
    private $endDate;
    private $renovation;

    /**
     * ContractCreateCommand constructor.
     * @param $id
     * @param $endDate
     * @param $renovation
     */
    public function __construct($id, $endDate, $renovation)
    {
        $this->id = $id;
        $this->endDate = $endDate;
        $this->renovation = $renovation;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function endDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function renovation()
    {
        return $this->renovation;
    }
}