<?php

namespace OneToMany\LlmSdk\Client\Gemini\Type\Batch;

final readonly class Batch
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public string $model,
        public string $name,
        public string $displayName,
        public ?Output $output = null,
        // public Stats $batchStats,
        // public State $state,
        // public bool $done = false,
    )
    {
    }
}
