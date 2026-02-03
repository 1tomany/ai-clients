<?php

namespace OneToMany\AI\Request\Prompt;

use OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface;
use OneToMany\AI\Contract\Input\Request\Content\ContentInterface;

final class CompilePromptRequest implements CompileRequestInputInterface
{
    /**
     * @param non-empty-lowercase-string $vendor
     * @param non-empty-lowercase-string $model
     * @param list<ContentInterface> $contents
     */
    public function __construct(
        private readonly string $vendor,
        private readonly string $model,
        private array $contents = [],
    ) {
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface
     */
    public function getContents(): array
    {
        return $this->contents;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface
     */
    public function addContent(ContentInterface $content): static
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface
     */
    public function hasContents(): bool
    {
        return [] !== $this->contents;
    }
}
