<?php

namespace OneToMany\AI\Client\OpenAi\Type\Error;

final readonly class Error
{
    /**
     * @param non-empty-string $message
     * @param ?non-empty-string $code
     */
    public function __construct(
        public string $message,
        public ?string $code = null,
    ) {
    }
}
