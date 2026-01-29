<?php

namespace OneToMany\AI\Contract\Client;

use OneToMany\AI\Contract\Request\Prompt\CompilePromptRequestInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

interface PromptNormalizerInterface extends NormalizerInterface
{
    /**
     * @param CompilePromptRequestInterface $data
     *
     * @return array<non-empty-string, mixed>
     */
    public function normalize(mixed $data, ?string $format = null, array $context = []): array;
}
