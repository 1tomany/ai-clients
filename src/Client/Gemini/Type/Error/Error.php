<?php

namespace OneToMany\AI\Client\Gemini\Type\Error;

use function array_filter;
use function explode;
use function implode;
use function trim;

final readonly class Error
{
    public string $message;

    public function __construct(string $message)
    {
        // Remove the extra spaces between sentences that Gemini likes to add
        $this->message = trim(implode(' ', array_filter(explode(' ', $message))));
    }
}
