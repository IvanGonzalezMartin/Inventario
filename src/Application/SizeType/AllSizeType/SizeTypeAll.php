<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 12:33
 */

namespace App\Application\SizeType\AllSizeType;


use App\Domain\Services\SizeType\SizeTypeAllService;

class SizeTypeAll
{
    private $sizeTypeAll;
    private $dataTransform;

    public function __construct(SizeTypeAllService $sizeTypeAll, SizeTypeAllDataTransform $dataTransform)
    {
        $this->sizeTypeAll = $sizeTypeAll;
        $this->dataTransform = $dataTransform;
    }

    public function handle(SizeTypeAllCommand $roleCreateCommand)
    {
        return $this->dataTransform->transform($this->sizeTypeAll->__invoke());
    }
}