<?php

namespace OneToMany\AI\Contract\Input\Request;

interface DispatchRequestInputInterface
{
    /**
     * @return non-empty-lowercase-string
     */
    public function getModel(): string;

    /**
     * @return array<string, mixed>
     */
    public function getRequest(): array;
}
