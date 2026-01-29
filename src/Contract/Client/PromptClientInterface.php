<?php

namespace OneToMany\AI\Contract\Client;

use OneToMany\AI\Contract\Request\Prompt\SendPromptRequestInterface;
use OneToMany\AI\Contract\Response\Prompt\SentPromptResponseInterface;

interface PromptClientInterface
{
    public function send(SendPromptRequestInterface $request): SentPromptResponseInterface;
}
