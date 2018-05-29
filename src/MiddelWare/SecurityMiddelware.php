<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 8:08
 */

namespace App\MiddelWare;


use App\MiddelWare\Shared\FactoryOfFilesSecurity;
use League\Tactician\Middleware;
use Symfony\Component\HttpFoundation\RequestStack;

class SecurityMiddelware implements Middleware
{

    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack;
    }

    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $newCommand = FactoryOfFilesSecurity::getInstance()->getSecurity(get_class($command))->execute($this->request, $command);

        return $next($newCommand);
    }

}