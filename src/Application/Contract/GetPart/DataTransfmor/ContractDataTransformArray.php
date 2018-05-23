<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 11:19
 */

namespace App\Application\Contract\GetPart\DataTransfmor;


use App\Application\Contract\GetPart\ContractGetPartDataTransform;

class ContractDataTransformArray implements ContractGetPartDataTransform
{

    public function transform($data)
    {
        $contract = [];
        foreach ($data as $contracts){
            $contract[]= [
                "ID" => $contracts->getId(),
                "User ID" => $contracts->getUserID(),
                "Start Date" => $contracts->getStartDate(),
                "End Date" => $contracts->getEndDate(),
                "Renovation" => $contracts->getRenovation()
            ];
        }
        return $contract;
    }
}