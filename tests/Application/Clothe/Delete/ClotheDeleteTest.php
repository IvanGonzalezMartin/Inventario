<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:01
 */

namespace App\Tests\Application\Clothe\Delete;

use App\Application\Clothe\Delete\ClotheDelete;
use App\Application\Clothe\Delete\ClotheDeleteCommand;
use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\Clothe\Exceptions\ClotheICanNotDeletedBecauseHaveStockException;
use App\Domain\Model\Clothe\Exceptions\ClotheIdDoesntExistException;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStock;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Services\Clothe\ClotheDeleteService;
use PHPUnit\Framework\TestCase;

class ClotheDeleteTest extends TestCase
{

    private $stubRepository;
    private $stubDeleteRepository;
    private $stubClotheSizeStockRepository;
    /**
     * @var ClotheDelete
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheRepository::class);
        $this->stubDeleteRepository = $this->createMock(DeleteThingRepository::class);
        $this->stubClotheSizeStockRepository = $this->createMock(ClotheSizeStockRepository::class);

        $this->handle = new ClotheDelete(new ClotheDeleteService($this->stubRepository, $this->stubDeleteRepository, $this->stubClotheSizeStockRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_que_la_ropa_no_existe()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(ClotheIdDoesntExistException::class);

        $this->handle->handle(new ClotheDeleteCommand(1));
    }

    /**
     * @test
     */
    public function dado_el_id_de_una_ropa_comprobar_que_exista_stock()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Clothe('b091493d-4b29-42dd-9ec3-c3924dd26409',2,'names','other','names','names'));

        $this->stubClotheSizeStockRepository->method('givMeAllStock')
            ->willReturn(2);

        $this->expectException(ClotheICanNotDeletedBecauseHaveStockException::class);

        $this->handle->handle(new ClotheDeleteCommand(1));
    }
}
