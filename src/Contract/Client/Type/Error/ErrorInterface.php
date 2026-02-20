<?php

namespace OneToMany\AI\Clients\Contract\Client\Type\Error;

interface ErrorInterface
{
    public function getMessage(): string;

    public function getInlineMessage(): string;
}
