<?php

namespace OneToMany\AI\Contract\Response\File;

interface CachedFileResponseInterface
{
    /**
     * @return non-empty-lowercase-string
     */
    public function getVendor(): string;

    /**
     * @return non-empty-string
     */
    public function getUri(): string;

    /**
     * @return ?non-empty-string
     */
    public function getName(): ?string;

    /**
     * @return non-empty-string
     */
    public function getPurpose(): ?string;

    public function getExpiresAt(): ?\DateTimeImmutable;
}
