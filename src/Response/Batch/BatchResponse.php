<?php

namespace OneToMany\LlmSdk\Response\Batch;

use OneToMany\LlmSdk\Response\BaseResponse;

abstract readonly class BatchResponse extends BaseResponse
{
    /**
     * @param non-empty-lowercase-string $model
     * @param non-empty-string $uri
     * @param non-empty-string $status
     * @param ?non-empty-string $fileUri
     */
    public function __construct(
        string $model,
        private string $uri,
        private string $status,
        private ?string $fileUri = null,
    ) {
        parent::__construct($model);
    }

    /**
     * @return non-empty-string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return non-empty-string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return ?non-empty-string
     */
    public function getFileUri(): ?string
    {
        return $this->fileUri;
    }
}
