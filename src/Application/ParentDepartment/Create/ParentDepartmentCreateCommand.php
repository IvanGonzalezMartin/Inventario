<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:20
 */

namespace App\Application\ParentDepartment\Create;


use Assert\Assertion;

class ParentDepartmentCreateCommand
{
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * ParentDepartmentCreateCommand constructor.
     * @param $name
     */
    private $name;

    /**
     * ParentDepartmentCreateCommand constructor.
     * @param $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }
}