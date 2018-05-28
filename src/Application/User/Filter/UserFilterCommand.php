<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 14:39
 */

namespace App\Application\User\Filter;


use Assert\Assertion;

class UserFilterCommand
{
    private $name;
    private $codeEmployee;
    private $department;
    private $parentDepartment;
    private $page;
    private $usersPerPage;

    /**
     * UserFilterCommand constructor.
     * @param $name
     * @param $codeEmployee
     * @param $department
     * @param $parentDepartment
     * @param $page
     * @param $usersPerPage
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name, $codeEmployee, $department, $parentDepartment, $page, $usersPerPage)
    {
        $this->name = $name;
        $this->codeEmployee = $codeEmployee;
        $this->department = $department;
        $this->parentDepartment = $parentDepartment;
        $this->page = ($page) * $usersPerPage;
        if ($page > 0)
        $this->page = ($page - 1) * $usersPerPage;
        $this->usersPerPage = $usersPerPage;
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
    public function codeEmployee()
    {
        return $this->codeEmployee;
    }

    /**
     * @return mixed
     */
    public function department()
    {
        return $this->department;
    }

    /**
     * @return mixed
     */
    public function parentDepartment()
    {
        return $this->parentDepartment;
    }

    /**
     * @return mixed
     */
    public function page()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function usersPerPage()
    {
        return $this->usersPerPage;
    }




}