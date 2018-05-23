<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 9:09
 */

namespace App\Application\Clothe\Delete;

use App\Domain\Services\Clothe\ClotheDeleteService;

class ClotheDelete
{
    private $clotheDeleteService;

    public function __construct(ClotheDeleteService $clotheDeleteService)
    {
        $this->clotheDeleteService = $clotheDeleteService;
    }


    public function handle(ClotheDeleteCommand $clotheDeleteCommand)
    {
        $this->clotheDeleteService->__invoke($clotheDeleteCommand);
    }
}