<?php

namespace OneToMany\LlmSdk\Client\Gemini\Type\Batch;

use OneToMany\LlmSdk\Client\Gemini\Type\Batch\Enum\State;

final readonly class Batch
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public string $model,
        public string $displayName,

        // public InputConfig $inputConfig,
        public \DateTimeImmutable $createTime,
        public \DateTimeImmutable $updateTime,
        // public Stats $batchStats,
        public State $state,
        public string $name,
        // public ?Output $output = null,
    ) {
    }
}
