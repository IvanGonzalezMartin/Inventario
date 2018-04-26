<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 15:48
 */

namespace App\Application\Clothe\Creator;


use App\Domain\Services\Clothe\ClotheCreator;

class ClotheCreate
{
    private $clotheCreator;

    public function __construct(ClotheCreator $clotheCreator )
    {
        $this->clotheCreator = $clotheCreator;
    }

    public function handler(ClotheCreateCommand $clotheCreateCommand)
    {

    }
}