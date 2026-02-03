<?php

namespace OneToMany\AI\Contract\Action\Request;

use OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface;
use OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface;

interface CompileRequestActionInterface
{
    public function act(CompileRequestInputInterface $request): CompiledPromptResponseInterface;
}
