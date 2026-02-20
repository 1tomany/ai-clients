<?php

namespace OneToMany\LlmSdk\Contract\Client\Type\Error;

interface ErrorInterface
{
    public function getMessage(): string;

    public function getInlineMessage(): string;
}
