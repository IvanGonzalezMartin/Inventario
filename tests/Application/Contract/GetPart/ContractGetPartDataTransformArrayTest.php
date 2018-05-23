<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:10
 */

namespace App\Tests\Application\Contract\GetPart;

use App\Application\Contract\GetPart\ContractGetPart;
use App\Application\Contract\GetPart\ContractGetPartCommand;
use App\Application\Contract\GetPart\ContractGetPartDataTransform;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Services\Contract\ContractGetPartService;
use PHPUnit\Framework\TestCase;

class ContractGetPartDataTransformArrayTest extends TestCase
{
    /**
     * @var ContractGetPart
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new ContractGetPart(new ContractGetPartService( $this->createMock(ContractRepository::class)),
                                                                        $this->createMock(ContractGetPartDataTransform::class));
    }

    /**
     * @test
     */
    public function comprubea_que_muestre_bien()
    {
        $this->handle->handle(new ContractGetPartCommand(1));

        $this->assertTrue(true);
    }
}
