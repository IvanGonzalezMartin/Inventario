<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:35
 */

namespace App\Domain\Services\Clothe;


use App\Application\Clothe\GetPart\ClotheGetPartCommand;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;

class ClotheGetPartService
{
    /**
     * @var ClotheRepository
     */
    private $repository;


    public function __construct(ClotheRepository $clotheRepository)
    {
        $this->repository = $clotheRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(ClotheGetPartCommand $clotheGetPartCommand)
    {
        return $this->repository->findByClotheCategoryId($clotheGetPartCommand->id());
    }
}