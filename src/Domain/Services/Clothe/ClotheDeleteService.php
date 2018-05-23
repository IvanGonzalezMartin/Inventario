<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 9:08
 */

namespace App\Domain\Services\Clothe;

use App\Application\Clothe\Delete\ClotheDeleteCommand;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\Clothe\Exceptions\ClotheICanNotDeletedBecauseHaveStockException;
use App\Domain\Model\Clothe\Exceptions\ClotheIdDoesntExistException;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use Ramsey\Uuid\Uuid;

class ClotheDeleteService
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
     * @var ClotheSizeStockRepository
     */
    private $clotheSizeStockRepository;

    public function __construct(ClotheRepository $clothe,
                                DeleteThingRepository $deleteThingRepository,
                                ClotheSizeStockRepository $clotheSizeStockRepository)
    {
        $this->clothe = $clothe;
        $this->deleteThingRepository = $deleteThingRepository;
        $this->clotheSizeStockRepository = $clotheSizeStockRepository;
    }


    public function __invoke(ClotheDeleteCommand $clotheDeleteCommand)
    {
        $clothe = $this->clothe->findById($clotheDeleteCommand->id());

        $arrayClotheSizeStock = $this->clotheSizeStockRepository->givMeAllSizeClotheStock($clotheDeleteCommand->id());

        if (empty($clothe))
            throw new ClotheIdDoesntExistException($clotheDeleteCommand->id());

        if (0 != $this->clotheSizeStockRepository->givMeAllStock($clotheDeleteCommand->id()))
            throw new ClotheICanNotDeletedBecauseHaveStockException($clotheDeleteCommand->id());

        $uuid = Uuid::uuid4();

        $delete = new DeleteThing('Varios', $uuid, 'Clothe');

        $this->deleteThingRepository->insert($delete);

        $clothe->setDeleteID($uuid);

        foreach ($arrayClotheSizeStock as $deleteClotheSizeStock) {
            $deleteClotheSizeStock->setDeleteId($uuid);
        }

        $this->clotheSizeStockRepository->updateAll();

        $this->clothe->update();
    }
}