<?php

namespace App\Tests\Application\Contract\Create;

use App\Application\Contract\Create\ContractCreate;
use App\Application\Contract\Create\ContractCreateCommand;
use App\Domain\Model\Contract\Contract;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\Contract\Exceptions\ContractUserAlreadyExistsException;
use App\Domain\Model\Contract\Exceptions\DateIsOldException;
use App\Domain\Model\User\Exceptions\UserAlreadyExistsException;
use App\Domain\Model\User\Exceptions\UserNotFoundException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Contract\ContractCreatorService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ContractCreateTest extends TestCase
{
    private $stubRepository;
    private $stubUserRepository;
    /**
     * @var ContractCreate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ContractRepository::class);
        $this->stubUserRepository = $this->createMock(UserRepository::class);
        $this->handle = new ContractCreate(new ContractCreatorService($this->stubRepository,$this->stubUserRepository));
    }

    /**
     * @test
     */
    public function dada_una_fecha_comprobar_si_es_mayor_a_la_actual()
    {
        $this->expectException(DateIsOldException::class);

        $this->handle->handler(new ContractCreateCommand('213586ce-77b1-4481-b8b7-108e88281a89',"10-12-1999","true"));
    }

    /**
     * @test
     */
    public function dado_un_usuario_id_comprobar_si_no_existe_en_la_tabla_user()
    {
        $this->stubUserRepository->method('findById')
            ->willReturn(null);

        $this->expectException(UserNotFoundException::class);

        $this->handle->handler(new ContractCreateCommand('213586ce-77b1-4481-b8b7-108e88281a89', '2-02-2099',""));
    }

    /**
     * @test
     */
    public function dado_un_usuario_id_comprobar_si_existe_en_la_tabla_user()
    {
        $this->stubRepository->method('findByUserId')
            ->willReturn(new Contract("213586ce-77b1-4481-b8b7-108e88281a89", "2-02-2099",""));

        $this->expectException(ContractUserAlreadyExistsException::class);

        $this->handle->handler(new ContractCreateCommand('213586ce-77b1-4481-b8b7-108e88281a89', '2-02-2099',""));
    }

    /**
     * @test
     */
    public function comprobar_si_se_crea_bien_un_contrato()
    {
        $this->stubUserRepository->method('findById')
            ->willReturn(new User("213586ce-77b1-4481-b8b7-108e88281a89","","","","","","",""));

        $this->stubRepository->method('findById')
            ->willReturn(new Contract("213586ce-77b1-4481-b8b7-108e88281a89","2-02-2099",""));

        $this->handle->handler(new ContractCreateCommand('213586ce-77b1-4481-b8b7-108e88281a89', '2-02-2099',""));

        Assert::assertTrue(true);
    }
}
