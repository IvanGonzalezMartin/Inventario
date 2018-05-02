<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:50
 */

namespace App\Domain\Shared;


use Assert\Assertion;

class StringValueObject
{
    protected $value;

    /**
     * StringValueObject constructor.
     * @param string $value
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $value)
    {
        Assertion::notNull($value);
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}