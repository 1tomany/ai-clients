<?php

namespace OneToMany\AI\Client\Gemini\Type\Content;

use OneToMany\AI\Client\Gemini\Type\Content\Enum\FinishReason;

final readonly class Candidate
{
    /**
     * @param non-negative-int $index
     */
    public function __construct(
        public Content $content,
        public ?FinishReason $finishReason,
        public int $index = 0,
    ) {
    }
}
