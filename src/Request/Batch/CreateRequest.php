<?php

namespace OneToMany\LlmSdk\Request\Batch;

use OneToMany\LlmSdk\Request\BaseRequest;

use function trim;

class CreateRequest extends BaseRequest
{
    /**
     * @var ?non-empty-string
     */
    private ?string $name = null;

    /**
     * @var ?non-empty-string
     */
    private ?string $fileUri = null;

    /**
     * @var ?non-empty-string
     */
    private ?string $fileName = null;

    /**
     * @var ?non-empty-string
     */
    private ?string $endpoint = null;

    public function withName(?string $name): static
    {
        $this->name = trim($name ?? '') ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?non-empty-string $fileUri
     */
    public function withFileUri(?string $fileUri): static
    {
        $this->fileUri = trim($fileUri ?? '') ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getFileUri(): ?string
    {
        return $this->fileUri;
    }

    /**
     * @param ?non-empty-string $fileName
     */
    public function withFileName(?string $fileName): static
    {
        $this->fileName = trim($fileName ?? '') ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function withEndpoint(?string $endpoint): static
    {
        $this->endpoint = trim($endpoint ?? '') ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }
}
