<?php

namespace OneToMany\AI\Clients\Client\OpenAi\Type\Response\Usage;

final readonly class OutputTokensDetails
{
    /**
     * @param non-negative-int $reasoning_tokens
     */
    public function __construct(
        public int $reasoning_tokens = 0,
    ) {
    }
}
