<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:50
 */

namespace App\Domain\Services\Gender;


use App\Domain\Model\Gender\Gender;

class GenderAllService
{
    public function __invoke()
    {
        return Gender::GENDER;
    }
}