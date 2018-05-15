<?php

namespace App\Tests\Application\ClotheCategory\Create;

use App\Application\ClotheCategory\Create\ClotheCategoryCreate;
use App\Application\ClotheCategory\Create\ClotheCategoryCreateCommand;
use App\Domain\Model\ClotheCategory\ClotheCategory;
use App\Domain\Model\SizeType\Exceptions\SizeTypeDosentExistException;
use App\Domain\Services\ClotheCategory\ClotheCategoryCreatorService;
use App\Domain\Model\ClotheCategory\ClotheCategoryRepository;
use PHPUnit\Framework\TestCase;

class ClotheCategoryCreateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var ClotheCategoryCreate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ClotheCategoryRepository::class);
        $this->handle = new ClotheCategoryCreate(new ClotheCategoryCreatorService($this->stubRepository));
    }
    
    /**
     * @test
     */
    public function dado_un_typeSizeName_comprobar_si_no_es_valido()
    {
        $this->expectException(SizeTypeDosentExistException::class);

        $this->handle->handler(new ClotheCategoryCreateCommand("asd", "ALPHABETI"));
    }

    /**
     * @test
     */
    public function dado_un_typeSizeName_comprobar_si_es_valido()
    {
        $this->handle->handler(new ClotheCategoryCreateCommand("", "ALPHABETIC"));

        self::assertTrue(true);
    }

    /**
     * @test
     */
    public function comprobar_que_se_inserta_correctamente_un_clothe_category()
    {

        $this->handle->handler(new ClotheCategoryCreateCommand('asdasdads', 'NUMERIC'));

        self::assertTrue(true);
    }
    
    
    

}
