<?php

namespace OneToMany\LlmSdk\Contract\Factory;

use OneToMany\LlmSdk\Contract\Client\ClientInterface;

/**
 * @template T of ClientInterface
 */
interface ClientFactoryInterface
{
    /**
     * @param non-empty-lowercase-string $model
     *
     * @return T
     */
    public function create(string $model): ClientInterface;
}
