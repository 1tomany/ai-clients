<?php

namespace OneToMany\AI\Clients\Contract\Factory;

use OneToMany\AI\Clients\Contract\Client\ClientInterface;

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
