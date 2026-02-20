<?php

namespace OneToMany\AI\Clients\Request\File;

use OneToMany\AI\Clients\Request\BaseRequest;

class DeleteRequest extends BaseRequest
{
    /**
     * @param non-empty-string $uri
     */
    public function __construct(string $model, private string $uri)
    {
        parent::__construct($model);
    }

    /**
     * @return non-empty-string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}
