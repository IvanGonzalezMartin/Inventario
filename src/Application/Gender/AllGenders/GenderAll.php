<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:49
 */

namespace App\Application\Gender\AllGenders;


use App\Domain\Services\Gender\GenderAllService;

class GenderAll
{
    private $genderAll;
    private $dataTransform;

    public function __construct(GenderAllService $genderAllService, GenderAllDataTransform $dataTransform)
    {
        $this->genderAll = $genderAllService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(GenderAllCommand $genderAllCommand)
    {
        return $this->dataTransform->transform($this->genderAll->__invoke());
    }
}