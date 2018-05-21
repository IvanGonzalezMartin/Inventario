<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 11:13
 */

namespace App\Tests\Application\ClotheCategory\Update;

use App\Application\ClotheCategory\Update\ClotheCategoryUpdate;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdateCommand;
use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryAlreadyExistsException;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCategoryDoesntExistException;
use App\Domain\Services\ClotheCategory\ClotheCategoryUpdaterService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ClotheCategoryUpdateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var ClotheCategoryUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheCategoryRepository::class);
        $this->handle = new ClotheCategoryUpdate(new ClotheCategoryUpdaterService($this->stubRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_si_existe()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(ClotheCategoryDoesntExistException::class);

        $this->handle->handle(new ClotheCategoryUpdateCommand("1","asd"));
    }

    /**
     * @test
     */
    public function dado_un_nombre_comprobar_si_existe()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ClotheCategory('asd','asd'));

        $this->stubRepository->method('findByName')
            ->willReturn(new ClotheCategory('asd','asd'));

        $this->expectException(ClotheCategoryAlreadyExistsException::class);

        $this->handle->handle(new ClotheCategoryUpdateCommand("1","asd"));
    }

    /**
     * @test
     */
    public function comprobar_si_hace_update_a_los_valores()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ClotheCategory("1","asdfg"));


        $this->handle->handle(new ClotheCategoryUpdateCommand(1, 'asdasdasd'));

        Assert::assertTrue(true);
    }
}
