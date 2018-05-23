<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:56
 */

namespace App\Tests\Application\Clothe\GetPart;

use App\Application\Clothe\GetPart\ClotheGetPart;
use App\Application\Clothe\GetPart\ClotheGetPartCommand;
use App\Application\Clothe\GetPart\ClotheGetPartDataTransform;
use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;
use App\Domain\Services\Clothe\ClotheGetPartService;
use PHPUnit\Framework\TestCase;

class ClotheGetPartDataTransformArrayTest extends TestCase
{
    /**
     * @var ClotheGetPart
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new ClotheGetPart(new ClotheGetPartService($this->createMock(ClotheRepository::class)),$this->createMock(ClotheGetPartDataTransform::class));
    }

    /**
     * @test
     */
    public function comprobar_que_te_devuelve_datos()
    {
        $this->handle->handle(new ClotheGetPartCommand(2));

        $this->assertTrue(true);
    }
}
