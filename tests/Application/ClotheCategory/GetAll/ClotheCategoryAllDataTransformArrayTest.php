<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 9:02
 */

namespace App\Tests\Application\ClotheCategory\GetAll;

use App\Application\ClotheCategory\GetAll\ClotheCategoryAll;
use App\Application\ClotheCategory\GetAll\ClotheCategoryAllCommand;
use App\Application\ClotheCategory\GetAll\ClotheCategoryAllDataTransform;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Services\ClotheCategory\ClotheCategoryGetAllService;
use PHPUnit\Framework\TestCase;

class ClotheCategoryAllDataTransformArrayTest extends TestCase
{
    /**
     * @var ClotheCategoryAll
     */
    private $handle;

    /**
     * @var ClotheCategoryRepository
     */
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheCategoryRepository::class);

        $this->handle = new ClotheCategoryAll(new ClotheCategoryGetAllService($this->stubRepository), $this->createMock(ClotheCategoryAllDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_todos_los_clothe_category_bien()
    {
        $this->stubRepository->method('getAll')
            ->willReturn(null);
        $this->handle->handle(new ClotheCategoryAllCommand());
        $this->assertTrue(true);
    }
}
