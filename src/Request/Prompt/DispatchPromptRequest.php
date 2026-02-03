<?php

namespace OneToMany\AI\Request\Prompt;

use OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface;
use OneToMany\AI\Contract\Response\Prompt\CompiledPromptResponseInterface;
use OneToMany\AI\Exception\InvalidArgumentException;

final readonly class DispatchPromptRequest implements DispatchRequestInputInterface
{
    /**
     * @param non-empty-lowercase-string $vendor
     * @param non-empty-lowercase-string $model
     * @param array<string, mixed> $request
     *
     * @throws InvalidArgumentException the request is empty
     */
    public function __construct(
        private string $vendor,
        private string $model,
        private array $request,
    ) {
        if ([] === $request) {
            throw new InvalidArgumentException('The request cannot be empty.');
        }
    }

    public static function create(CompiledPromptResponseInterface $response): self
    {
        return new self($response->getVendor(), $response->getModel(), $response->getRequest());
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @see OneToMany\AI\Contract\Input\Request\DispatchRequestInputInterface
     */
    public function getRequest(): array
    {
        return $this->request;
    }
}
