<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:35
 */

namespace App\Application\Role\Create;


use Assert\Assertion;

class RoleCreateCommand
{

    private $name;
    private $description;
    const STRING_ARGUMENT_EXCEPTION = 'The name field must be string without numbers or characters';
    const EMPTY_ARGUMENT_EXCEPTION = 'The name field should not be empty';

    /**
     * RoleCreateCommand constructor.
     * @param $name
     * @param null|string $description
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name, ?string $description)
    {

        Assertion::notNull($name, self::EMPTY_ARGUMENT_EXCEPTION);
        Assertion::regex($name, "/^[a-zA-Z ]*$/",self::STRING_ARGUMENT_EXCEPTION);

        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }


}