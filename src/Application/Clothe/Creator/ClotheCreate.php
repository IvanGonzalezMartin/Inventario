<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 15:48
 */

namespace App\Application\Clothe\Creator;

use App\Domain\Model\Clothe\Clothe;
use App\Domain\Services\Clothe\ClotheCreatorService;

class ClotheCreate
{
    private $clotheCreator;

    public function __construct(ClotheCreatorService $clotheCreator )
    {
        $this->clotheCreator = $clotheCreator;
    }

    public function handle(ClotheCreateCommand $clotheCreateCommand)
    {
        $this->clotheCreator->__invoke(new Clothe(  $clotheCreateCommand->getId(),
                                                    $clotheCreateCommand->getClotheCategoryID(),
                                                    $clotheCreateCommand->getName(),
                                                    $clotheCreateCommand->getGender(),
                                                    $clotheCreateCommand->getPhoto(),
                                                    $clotheCreateCommand->getDescription())
                                        );
    }
}