<?php

namespace OneToMany\AI\Contract\Request\Prompt;

use OneToMany\AI\Contract\Request\Prompt\Content\ContentInterface;

interface CompilePromptRequestInterface
{
    /**
     * @var non-empty-lowercase-string
     */
    public string $vendor { get; }

    /**
     * @var non-empty-lowercase-string
     */
    public string $model { get; }

    /**
     * @var list<ContentInterface>
     */
    public array $contents { get; }
}
