<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:58
 */

namespace App\EventListener;


use App\Infrastructure\Utils\MyOwnHttpCodes;
use Assert\InvalidArgumentException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    const INVALID_ARGUMENT_EXCEPTION = 'Invalid parameter passed';

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $response = new JsonResponse();

        if ($exception instanceof InvalidArgumentException) {
            $response->setStatusCode(MyOwnHttpCodes::HTTP_BAD_REQUEST);
            $response->setData([self::INVALID_ARGUMENT_EXCEPTION]);
        }

        $event->setResponse($response);
    }
}