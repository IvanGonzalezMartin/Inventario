<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:04
 */

namespace App\Application\Department\Update;


use Assert\Assertion;

class DepartmentUpdateCommand
{

    private $name;
    private $id;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * DepartmentUpdateCommand constructor.
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id,string $name)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }
}