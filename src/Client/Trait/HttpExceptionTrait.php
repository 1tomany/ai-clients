<?php

namespace OneToMany\LlmSdk\Client\Trait;

use OneToMany\LlmSdk\Exception\RuntimeException;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface as HttpClientHttpExceptionInterface;

trait HttpExceptionTrait
{
    /**
     * @throws RuntimeException
     */
    protected function handleHttpException(HttpClientExceptionInterface $exception): never
    {
        if ($exception instanceof HttpClientHttpExceptionInterface) {
            throw new RuntimeException($this->decodeErrorResponse($exception->getResponse())->getMessage(), $exception->getResponse()->getStatusCode(), $exception);
        }

        throw new RuntimeException($exception->getMessage(), previous: $exception);
    }
}
