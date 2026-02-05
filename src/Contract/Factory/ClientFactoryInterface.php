<?php

namespace OneToMany\AI\Contract\Factory;

use OneToMany\AI\Contract\Client\ModelClientInterface;

/**
 * @template T of ModelClientInterface
 */
interface ClientFactoryInterface
{
    /**
     * @param non-empty-lowercase-string $model
     *
     * @return T
     */
    public function create(string $model): ModelClientInterface;
}
