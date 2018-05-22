<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:03
 */

namespace App\Domain\Services\Gender;


use App\Domain\Model\Gender\Exceptions\GenderNotFoundException;
use App\Domain\Model\Gender\Gender;

class GenderCheckExistService
{
    public function __invoke($gender)
    {
        if (false === in_array($gender,Gender::GENDER))
            throw new GenderNotFoundException($gender);
    }
}