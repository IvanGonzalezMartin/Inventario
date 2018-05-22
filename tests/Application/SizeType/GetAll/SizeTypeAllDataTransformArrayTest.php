<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:52
 */

namespace App\Tests\Application\SizeType\GetAll;

use App\Application\SizeType\AllSizeType\SizeTypeAll;
use App\Application\SizeType\AllSizeType\SizeTypeAllCommand;
use App\Application\SizeType\AllSizeType\SizeTypeAllDataTransform;
use App\Domain\Services\SizeType\SizeTypeAllService;
use PHPUnit\Framework\TestCase;

class SizeTypeAllDataTransformArrayTest extends TestCase
{
    /**
     * @var SizeTypeAll
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new SizeTypeAll(new SizeTypeAllService(), $this->createMock(SizeTypeAllDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_todos_los_sizeType_bien()
    {
        $this->handle->handle(new SizeTypeAllCommand());
        $this->assertTrue(true);
    }
}
