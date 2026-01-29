<?php

namespace OneToMany\AI\Contract\Response\Prompt;

interface CompiledPromptResponseInterface
{
    /**
     * @return non-empty-lowercase-string
     */
    public function getVendor(): string;

    /**
     * @return non-empty-lowercase-string
     */
    public function getModel(): string;

    /**
     * @return array<string, mixed>
     */
    public function getRequest(): array;
}
