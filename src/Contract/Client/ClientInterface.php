<?php

namespace OneToMany\AI\Contract\Client;

interface ClientInterface
{
    /**
     * @param non-empty-lowercase-string $model
     */
    public function supportsModel(string $model): bool;

    // public function createFile();

    // public function compileRequest();

    //
}
