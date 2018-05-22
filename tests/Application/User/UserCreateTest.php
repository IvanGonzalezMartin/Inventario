<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:37
 */

namespace App\Tests\Application\ParentDepartment\Create;

use App\Application\User\Create\UserCreate;
use App\Application\User\Create\UserCreateCommand;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Department\DepartmentCheckExistService;
use App\Domain\Services\Gender\GenderCheckExistService;
use App\Domain\Services\User\UserCheckEmailService;
use App\Domain\Services\User\UserCheckEmployeeCodeService;
use App\Domain\Services\User\UserCheckNickNameService;
use App\Domain\Services\User\UserCheckNifService;
use App\Domain\Services\User\UserCheckUuidExistService;
use App\Domain\Services\User\UserCreatorService;
use PHPUnit\Framework\TestCase;

class UserCreateTest extends TestCase
{
    /**
     * @var UserCreate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->handle = new UserCreate(new UserCreatorService(  $this->createMock(UserRepository::class),
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
    public function create_good_user()
    {
        $this->handle->handle(new UserCreateCommand('5a11ac68-ac5c-4b01-bc8f-5d156215bb13',
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
