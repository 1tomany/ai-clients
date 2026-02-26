<?php

namespace OneToMany\LlmSdk\Client\Gemini\Type\Batch;

final readonly class Output
{
    public function __construct(public string $responsesFile)
    {
    }
}
