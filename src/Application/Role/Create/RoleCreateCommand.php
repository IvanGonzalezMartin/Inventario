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

    /**
     * RoleCreateCommand constructor.
     * @param $name
     * @param null|string $description
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name, ?string $description)
    {
        Assertion::string($name);
        Assertion::notNull($name);

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