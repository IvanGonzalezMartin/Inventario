<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:37
 */

namespace App\Tests\Application\User\GetByUuid;


use App\Application\User\GetByUuid\DataTransforms\UserGetByUuidDataTransformArray;
use App\Application\User\GetByUuid\UserGetByUuid;
use App\Application\User\GetByUuid\UserGetByUuidCommand;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\User\UserGetterByUuidService;
use PHPUnit\Framework\TestCase;

class UserCreateTest extends TestCase
{
    /**
     * @var UserGetByUuid
     */
    private $handle;
    /**
     * @var UserRepository
     */
    private $stubRepository;


    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(UserRepository::class);

        $this->handle = new UserGetByUuid( new UserGetterByUuidService($this->stubRepository), new UserGetByUuidDataTransformArray());
    }


    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_uno_o_nada_de_user_pasando_uuid()
    {
        $this->stubRepository->method('findByID')
            ->willReturn(null);

        $this->handle->handle(new UserGetByUuidCommand(''));

        $this->assertTrue(true);
    }
}
