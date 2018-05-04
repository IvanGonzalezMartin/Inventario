<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:26
 */

namespace App\Application\Department\Create;


use Assert\Assertion;

class DepartmentCreateCommand
{
    private $name;
    private $parentID;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * DepartmentCreateCommand constructor.
     * @param $name
     * @param null|string $description
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($parentID,string $name)
    {
        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);
        $this->name = $name;
        $this->parentID = $parentID;
    }

    /**
     * @return mixed
     */
    public function getParentID()
    {
        return $this->parentID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}