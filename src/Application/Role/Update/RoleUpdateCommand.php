<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 8:03
 */

namespace App\Application\Role\Update;


use Assert\Assertion;

class RoleUpdateCommand
{

    private $name;
    private $description;
    private $id;

    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_NAME_ARGUMENT_EXCEPTION = 'The name field should not be empty';
    const EMPTY_ID_ARGUMENT_EXCEPTION = 'The rolID field should not be empty';

    /**
     * RoleCreateCommand constructor.
     * @param $name
     * @param null|string $description
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($id, $name, ?string $description)
    {
        Assertion::notNull($id, self::EMPTY_ID_ARGUMENT_EXCEPTION);
        Assertion::notNull($name, self::EMPTY_NAME_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description(): ?string
    {
        return $this->description;
    }

    public function id(): string
    {
        return $this->id;
    }

}