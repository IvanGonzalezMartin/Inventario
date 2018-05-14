<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:23
 */

namespace App\Application\ParentDepartment\Update;


use Assert\Assertion;

class ParentDepartmentUpdateCommand
{

    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    const INT_ARGUMENT_EXCEPTION = 'The id field must be numbers without string';
    const INT_EMPTY_ARGUMENT_EXCEPTION = 'The id field should not be empty';
    /**
     * ParentDepartmentUpdateCommand constructor.
     * @param $name
     */
    private $name;

    /**
     * ParentDepartmentUpdateCommand constructor.
     * @param $id
     */
    private $id;

    /**
     * ParentDepartmentCreateCommand constructor.
     * @param $name
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id , $name)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);
        $this->name = $name;

        Assertion::notNull($id, self::INT_EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($id, "/^[0-9]*$/",self::INT_ARGUMENT_EXCEPTION);
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function name()
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