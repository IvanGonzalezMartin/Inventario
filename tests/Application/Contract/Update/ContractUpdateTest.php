<?php

namespace App\Tests\Application\Contract\Update;

use App\Application\Contract\Update\ContractUpdate;
use App\Application\Contract\Update\ContractUpdateCommand;
use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\Contract\Exceptions\ContractUserDonsentExistsException;
use App\Domain\Model\Contract\Exceptions\DateIsOldException;
use App\Domain\Services\Contract\ContractUpdateService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ContractUpdateTest extends TestCase
{
    private $stubRepository;

    /**
     * @var ContractUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ContractRepository::class);
        $this->handle = new ContractUpdate(new ContractUpdateService($this->stubRepository));
    }

    /**
     * @test
     */
    public function dado_userId_comprobar_si_existe_en_la_table()
    {
        $this->stubRepository->method('findByUserId')
            ->willReturn(null);

        $this->expectException(ContractUserDonsentExistsException::class);

        $this->handle->handle(new ContractUpdateCommand('8324b6b0-df81-4a20-8cc3-25e84b82f2d4', '2-02-2099', ""));
    }

    /**
     * @test
     */
    public function dada_una_fecha_comprobar_si_es_posterior_a_la_actual()
    {
        $this->stubRepository->method('findByUserId')
            ->willReturn(new Contract("8324b6b0-df81-4a20-8cc3-25e84b82f2d4","2-02-1099",""));

        $this->expectException(DateIsOldException::class);

        $this->handle->handle(new ContractUpdateCommand("8324b6b0-df81-4a20-8cc3-25e84b82f2d4","2-02-1099", ""));
    }

    /**
     * @test
     */
    public function dado_unos_valores_comprobar_que_hace_el_update()
    {
        $this->stubRepository->method('findByUserId')
            ->willReturn(new Contract("8324b6b0-df81-4a20-8cc3-25e84b82f2d4","2-02-2099",""));

        $this->handle->handle(new ContractUpdateCommand("8324b6b0-df81-4a20-8cc3-25e84b82f2d4","2-02-2099", ""));

        Assert::assertTrue(true);
    }
}