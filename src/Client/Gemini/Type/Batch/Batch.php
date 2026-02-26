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
        public string $name,
        public string $displayName,
        public ?Output $output = null,
        public State $state = State::Pending,
    ) {
    }
}
