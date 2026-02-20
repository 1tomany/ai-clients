<?php

namespace OneToMany\AI\Clients\Response;

abstract readonly class BaseResponse
{
    /**
     * @param non-empty-lowercase-string $model
     */
    public function __construct(private string $model)
    {
    }

    /**
     * @return non-empty-lowercase-string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}
