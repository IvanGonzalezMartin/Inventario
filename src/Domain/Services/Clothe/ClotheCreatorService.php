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
use App\Domain\Model\Clothe\Exceptions\ClotheNameAlreadyExistsException;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;
use App\Domain\Model\Clothe\Exceptions\ClotheIdAlreadyExistsException;
use App\Domain\Model\Gender\Exceptions\GenderNotFoundException;
use App\Domain\Model\Gender\Gender;

class ClotheCreatorService
{
    private $repository;
    private $clotheCategoryRepository;

    public function __construct(ClotheRepository $clotheRepository, ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->repository = $clotheRepository;
        $this->clotheCategoryRepository = $clotheCategoryRepository;
    }

    public function __invoke(Clothe $clothe)
    {
        if (false === in_array($clothe->getGender(),Gender::GENDER))
            throw new GenderNotFoundException($clothe->getGender());

        $oldClothe = $this->repository->findById($clothe->getId());

        if (false === empty($oldClothe))
            throw new ClotheIdAlreadyExistsException($clothe->getId());

        $clotheCategory = $this->clotheCategoryRepository->findById($clothe->getClotheCategoryId());

        if (empty($clotheCategory))
            throw new ClotheCategoryDoesntExistException($clothe->getClotheCategoryId());

        $clotheName = $this->repository->findByName($clothe->getName());
 
        if (false === empty($clotheName))
            throw new ClotheNameAlreadyExistsException($clothe->getName());



        $this->repository->insert($clothe);
        $this->repository->updateAll();
    }
}