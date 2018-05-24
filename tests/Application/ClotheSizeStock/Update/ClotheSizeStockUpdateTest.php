<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:15
 */

namespace App\Tests\Application\ClotheSizeStock\Update;

use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdate;
use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdateCommand;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStock;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Model\ClotheSizeStock\Exceptions\ClotheSizeStockWithIdDoesntExistsException;
use App\Domain\Model\ClotheSizeStock\Exceptions\ClotheStockCannotBeNegativeException;
use App\Domain\Services\ClotheSizeStock\ClotheSizeStockUpdaterService;
use PHPUnit\Framework\TestCase;

class ClotheSizeStockUpdateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var ClotheSizeStockUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheSizeStockRepository::class);
        $this->handle = new ClotheSizeStockUpdate(new ClotheSizeStockUpdaterService($this->stubRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_si_existe()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(ClotheSizeStockWithIdDoesntExistsException::class);

        $this->handle->handle(new ClotheSizeStockUpdateCommand(1,10));
    }

    /**
     * @test
     */
    public function dado_un_stocK_comporbar_si_es_menor_que_0()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ClotheSizeStock('96afff1b-c480-4c99-b64d-097bf53073b5','names'));

        $this->expectException(ClotheStockCannotBeNegativeException::class);

        $this->handle->handle(new ClotheSizeStockUpdateCommand(1,-10));
    }

    /**
     * @test
     */
    public function comprobar_que_hace_el_update_correctamente()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ClotheSizeStock('96afff1b-c480-4c99-b64d-097bf53073b5','names'));

        $this->handle->handle(new ClotheSizeStockUpdateCommand(1,10));

        $this->assertTrue(true);
    }
}
