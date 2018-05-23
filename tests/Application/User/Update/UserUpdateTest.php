<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:37
 */

namespace App\Tests\Application\User\Update;


use App\Application\User\Update\UserUpdate;
use App\Application\User\Update\UserUpdateCommand;
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Department\DepartmentCheckExistService;
use App\Domain\Services\Gender\GenderCheckExistService;
use App\Domain\Services\User\UserCheckEmailService;
use App\Domain\Services\User\UserCheckEmployeeCodeService;
use App\Domain\Services\User\UserCheckNickNameService;
use App\Domain\Services\User\UserCheckNifService;
use App\Domain\Services\User\UserCheckUuidExistService;
use App\Domain\Services\User\UserUpdatorService;
use PHPUnit\Framework\TestCase;

class UserUpdateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var UserUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(UserRepository::class);

        $this->handle = new UserUpdate(new UserUpdatorService(  $this->stubRepository,
                                                                $this->createMock(UserCheckEmailService::class),
                                                                $this->createMock(UserCheckNickNameService::class),
                                                                $this->createMock(UserCheckNifService::class),
                                                                $this->createMock(UserCheckEmployeeCodeService::class),
                                                                $this->createMock(DepartmentCheckExistService::class),
                                                                $this->createMock(GenderCheckExistService::class),
                                                                $this->createMock(UserCheckUuidExistService::class)));
    }

    /**
     * @test
     */
    public function fail_when_try_to_update_user_because_user_doesent_exist()
    {
        $this->stubRepository->method('findByID')
            ->willReturn(null);

        $this->expectException(UserDoesntExistsException::class);

        $this->handle->handle(new UserUpdateCommand('5a11ac68-ac5c-4b01-bc8f-5d156215bb13',
                                                    'nickName',
                                                    'surName',
                                                    'photo',
                                                    'telephone',
                                                    'email',
                                                    'password',
                                                    'nif',
                                                    1,
                                                    5,
                                                    'genderName')
        );

    }

    /**
     * @test
     * @throws \ReflectionException
     */
    public function update_good_user()
    {
        $this->stubRepository->method('findByID')
            ->willReturn($this->createMock(User::class));

        $this->handle->handle(new UserUpdateCommand('5a11ac68-ac5c-4b01-bc8f-5d156215bb13',
                'nickName',
                'surName',
                'photo',
                'telephone',
                'email',
                'password',
                'nif',
                1,
                5,
                'genderName')
        );

        $this->assertTrue(true);
    }

}
