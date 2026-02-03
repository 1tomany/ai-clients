<?php

namespace OneToMany\AI\Input\File;

class CacheFileInput
{
    /**
     * @var non-empty-lowercase-string
     */
    private string $vendor = 'mock';

    /**
     * @var ?non-empty-string
     */
    private ?string $path = null;

    /**
     * @var ?non-empty-string
     */
    private ?string $name = null;

    /**
     * @var non-empty-lowercase-string
     */
    private string $format = 'application/octet-stream';

    /**
     * @var ?non-empty-lowercase-string
     */
    private ?string $purpose = null;

    public function __construct()
    {
    }

    public function forVendor(string $vendor): static
    {
        $this->vendor = \strtolower(\trim($vendor)) ?: $this->vendor;

        return $this;
    }

    /**
     * @return non-empty-lowercase-string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }

    public function atPath(?string $path): static
    {
        $this->path = \trim($path ?? '') ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    public function usingName(?string $name): static
    {
        $this->name = \trim($name ?? '') ?: (\basename($this->path ?? '') ?: null);

        return $this;
    }

    /**
     * @return ?non-empty-string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function withFormat(?string $format): static
    {
        $this->format = \strtolower(\trim($format ?? '')) ?: $this->format;

        return $this;
    }

    /**
     * @return non-empty-lowercase-string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    public function withPurpose(?string $purpose): static
    {
        $this->purpose = \strtolower(\trim($purpose ?? '')) ?: null;

        return $this;
    }

    /**
     * @return ?non-empty-lowercase-string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }
}
