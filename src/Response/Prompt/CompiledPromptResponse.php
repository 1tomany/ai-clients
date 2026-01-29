<?php

namespace OneToMany\AI\Response\Prompt;

use OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface;

final readonly class CompiledPromptResponse implements CompiledPromptResponseInterface
{
    /**
     * @param non-empty-lowercase-string $vendor
     * @param non-empty-lowercase-string $model
     * @param array<string, mixed> $request
     */
    public function __construct(
        public string $vendor,
        public string $model,
        public array $request,
    ) {
    }

    /**
     * @see OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @see OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @see OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface
     */
    public function getRequest(): array
    {
        return $this->request;
    }
}
