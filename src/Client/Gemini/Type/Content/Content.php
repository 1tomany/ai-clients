<?php

namespace OneToMany\LlmSdk\Client\Gemini\Type\Content;

use OneToMany\LlmSdk\Client\Gemini\Type\Content\Candidate\Candidate;

final readonly class Content
{
    /**
     * @param list<Candidate> $candidates
     * @param non-empty-lowercase-string $modelVersion
     * @param non-empty-string $responseId
     */
    public function __construct(
        public array $candidates,
        public UsageMetadata $usageMetadata,
        public string $modelVersion,
        public string $responseId,
    ) {
    }
}
