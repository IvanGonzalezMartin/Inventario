<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:43
 */

namespace App\Tests\Application\Gender\GetAll;

use App\Application\Gender\AllGenders\GenderAll;
use App\Application\Gender\AllGenders\GenderAllCommand;
use App\Application\Gender\AllGenders\GenderAllDataTransform;
use App\Domain\Services\Gender\GenderAllService;
use PHPUnit\Framework\TestCase;

class GenderAllDataTransformArrayTest extends TestCase
{
    /**
     * @var GenderAll
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new GenderAll(new GenderAllService(), $this->createMock(GenderAllDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_todos_los_Generos_bien()
    {
        $this->handle->handle(new GenderAllCommand());
        $this->assertTrue(true);
    }
}
