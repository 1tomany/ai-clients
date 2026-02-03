<?php

namespace OneToMany\AI\Contract\Client;

use OneToMany\AI\Contract\Input\Request\CompileRequestInputInterface;
use OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface;
use OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface;
use OneToMany\AI\Contract\Response\Prompt\DispatchedPromptResponseInterface;

interface PromptClientInterface
{
    public function compile(CompileRequestInputInterface $request): CompiledPromptResponseInterface;

    public function dispatch(DispatchRequestInputInterface $request): DispatchedPromptResponseInterface;
}
