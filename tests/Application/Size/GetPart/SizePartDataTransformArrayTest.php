<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 13:36
 */

namespace App\Tests\Application\GetPart\Size;

use App\Application\Sizes\SizePart;
use App\Application\Sizes\SizePartCommand;
use App\Application\Sizes\SizePartDataTransform;
use App\Domain\Services\Size\SizePartService;
use PHPUnit\Framework\TestCase;

class SizePartDataTransformArrayTest extends TestCase
{
    /**
     * @var SizePart
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new SizePart(new SizePartService(), $this->createMock(SizePartDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_si_el_size_esta_en_el_array()
    {
        $this->handle->handle(new SizePartCommand('NUMERIC'));
        $this->assertTrue(true);
    }
}
