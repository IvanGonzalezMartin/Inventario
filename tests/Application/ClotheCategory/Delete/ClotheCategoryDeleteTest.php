<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 14:34
 */

namespace App\Tests\Application\ClotheCategory\Delete;

use App\Application\ClotheCategory\Delete\ClotheCategoryDelete;
use App\Application\ClotheCategory\Delete\ClotheCategoryDeleteCommand;
use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheRepository;
use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use App\Domain\Model\ClotheCategory\Exceptions\ClotheCathegoryCannotDeleteBecauseHaveClotheException;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Services\ClotheCategory\ClotheCategoryDeletorService;
use PHPUnit\Framework\TestCase;

class ClotheCategoryDeleteTest extends TestCase
{
    private $stubClotheCategoryRepository;
    private $stubDeleteRepository;
    private $stubRepository;
    /**
     * @var ClotheCategoryDelete
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheRepository::class);
        $this->stubDeleteRepository = $this->createMock(DeleteThingRepository::class);
        $this->stubClotheCategoryRepository = $this->createMock(ClotheCategoryRepository::class);

        $this->handle = new ClotheCategoryDelete(new ClotheCategoryDeletorService( $this->stubRepository, $this->stubDeleteRepository, $this->stubClotheCategoryRepository));
    }

    /**
     * @throws \Assert\AssertionFailedException
     * @test
     */
    public function dado_un_id_comprobar_que_no_existe_la_ropa()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Clothe('650c72ae-5934-4d4b-81bc-2dd10443c0e1',1,'names','','',''));

        $this->expectException(ClotheCathegoryCannotDeleteBecauseHaveClotheException::class);

        $this->handle->handle(new ClotheCategoryDeleteCommand(1));
    }

    /**
     * @throws \Assert\AssertionFailedException
     * @test
     */
    public function comprobar_que_haga_el_delete()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->stubDeleteRepository->method('insert')
            ->willReturn(new DeleteThing('2','650c72ae-5934-4d4b-81bc-2dd10443c0e1','names'));

        $delete = new ClotheCategory("names","NUMERIC");

        $this->stubClotheCategoryRepository->method('findById')
            ->willReturn($delete);

        $delete->setDeleteID('650c72ae-5934-4d4b-81bc-2dd10443c0e1');

        $this->handle->handle(new ClotheCategoryDeleteCommand(1));

        $this->assertTrue(true);
    }
}
