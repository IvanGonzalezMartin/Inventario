<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 15:41
 */

namespace App\Domain\Services\Clothe;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;

class ClotheCreator
{
    private $repository;

    public function __construct(ClotheRepository $clotheRepository)
    {
        $this->repository = $clotheRepository;
    }

    public function __invoke(Clothe $clothe)
    {

    }
}