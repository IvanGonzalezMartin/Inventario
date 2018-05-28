<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:39
 */

namespace App\Application\User\Filter;


use App\Domain\Services\User\UserFiltorService;

class UserFilter
{
    /**
     * @var UserFiltorService
     */
    private $userFiltorService;
    /**
     * @var UserFilterDataTransform
     */
    private $dataTransform;

    public function __construct(UserFiltorService $userFiltorService, UserFilterDataTransform $dataTransform)
    {
        $this->userFiltorService = $userFiltorService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(UserFilterCommand $filterCommand)
    {
        return $this->dataTransform->transform($this->userFiltorService->__invoke($filterCommand));
    }
}