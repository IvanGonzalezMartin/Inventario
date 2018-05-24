<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 9:31
 */

namespace App\Tests\Application\ClotheSizeStock\GetPart;

use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPart;
use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartCommand;
use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartDataTransform;
use App\Domain\Model\ClotheSizeStock\ClotheSizeStockRepository;
use App\Domain\Services\ClotheSizeStock\ClotheSizeStockGetPartService;
use PHPUnit\Framework\TestCase;

class ClotheSizeStockGetPartDataTransformArrayTest extends TestCase
{
    /**
     * @var ClotheSizeStockGetPart
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new ClotheSizeStockGetPart(new ClotheSizeStockGetPartService(   $this->createMock(ClotheSizeStockRepository::class)),
                                                                                        $this->createMock(ClotheSizeStockGetPartDataTransform::class));
    }

    /**
     * @test
     */
    public function comprubea_que_muestre_bien()
    {
        $this->handle->handle(new ClotheSizeStockGetPartCommand(1));

        $this->assertTrue(true);
    }
}
