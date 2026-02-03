<?php

namespace OneToMany\AI\Contract\Action\Request;

use OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface;
use OneToMany\AI\Contract\Response\Prompt\DispatchedPromptResponseInterface;

interface DispatchRequestActionInterface
{
    public function act(DispatchRequestInputInterface $request): DispatchedPromptResponseInterface;
}
