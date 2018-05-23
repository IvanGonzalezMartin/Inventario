<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:37
 */

namespace App\Tests\Application\User\Delete;


use App\Application\User\Delete\UserDelete;
use App\Application\User\Delete\UserDeleteCommand;
use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\User\UserDeletorService;
use PHPUnit\Framework\TestCase;

class UserCreateTest extends TestCase
{
    /**
     * @var UserDelete
     */
    private $handle;
    /**
     * @var UserRepository
     */
    private $stubRepository;
    private $stubContractRepository;



    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(UserRepository::class);
        $this->stubContractRepository = $this->createMock(ContractRepository::class);

        $this->handle = new UserDelete(  new UserDeletorService($this->stubRepository, $this->stubContractRepository, $this->createMock(DeleteThingRepository::class)));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function falla_al_encontrar_user_cuando_intenta_delete_user()
    {
        $this->stubRepository->method('findByID')
            ->willReturn(null);

        $this->expectException(UserDoesntExistsException::class);

        $this->handle->handle(new UserDeleteCommand(2));
    }

    /**
     * @test
     * @throws \ReflectionException
     */
    public function borrado_user_bien()
    {
        $this->stubRepository->method('findByID')
            ->willReturn($this->createMock(User::class));

        $this->handle->handle(new UserDeleteCommand(2));

        $this->assertTrue(true);
    }

}
