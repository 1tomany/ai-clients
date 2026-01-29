<?php

namespace OneToMany\AI\Contract\Request\Prompt;

interface SendPromptRequestInterface
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
     * @var array<string, mixed>
     */
    public function getRequest(): array;
}
