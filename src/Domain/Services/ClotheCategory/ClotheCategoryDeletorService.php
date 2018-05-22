<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:53
 */

namespace App\Domain\Services\ClotheCategory;

use App\Application\ClotheCategory\Delete\ClotheCategoryDeleteCommand;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCathegoryCannotDeleteBecauseHaveClotheException;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use Ramsey\Uuid\Uuid;

class ClotheCategoryDeletorService
{
    /**
     * @var ClotheRepository
     */
    private $clothe;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;

    /**
     * @var ClotheCategoryRepository
     */
    private $clotheCategoryRepository;

    public function __construct(ClotheRepository $clothe,
                                DeleteThingRepository $deleteThingRepository,
                                ClotheCategoryRepository $clotheCategoryRepository)
    {
        $this->clothe = $clothe;
        $this->deleteThingRepository = $deleteThingRepository;
        $this->clotheCategoryRepository = $clotheCategoryRepository;
    }

    /**
     * @param ClotheCategoryDeleteCommand $clotheCategoryDeleteCommand
     */
    public function __invoke(ClotheCategoryDeleteCommand $clotheCategoryDeleteCommand)
    {
        $clotheCategory = $this->clotheCategoryRepository->findById($clotheCategoryDeleteCommand->id());

        if ($this->clothe->findById($clotheCategoryDeleteCommand->id()))
            throw new ClotheCathegoryCannotDeleteBecauseHaveClotheException();

        $uuid = Uuid::uuid4();

        $this->deleteThingRepository->insert(new DeleteThing($clotheCategoryDeleteCommand->id(), $uuid, 'ClotheCategory'));

        $clotheCategory->setDeleteID($uuid);

        $this->clotheCategoryRepository->update();
    }
}