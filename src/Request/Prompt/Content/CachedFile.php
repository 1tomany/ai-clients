<?php

namespace OneToMany\AI\Request\Prompt\Content;

use OneToMany\AI\Contract\Request\Prompt\Content\ContentInterface;
use OneToMany\AI\Contract\Request\Prompt\Content\Enum\Role;
use OneToMany\AI\Exception\InvalidArgumentException;

use function strtolower;
use function trim;

final readonly class CachedFile implements ContentInterface
{
    public Role $role;

    /**
     * @param non-empty-string $uri
     * @param non-empty-lowercase-string $format
     */
    public function __construct(
        public string $uri,
        public string $format,
    ) {
        $this->role = Role::User;
    }

    public static function create(?string $uri, ?string $format): self
    {
        if (empty($uri = trim($uri ?? ''))) {
            throw new InvalidArgumentException('The URI cannot be empty.');
        }

        return new self($uri, strtolower(trim($format ?? '') ?: 'application/octet-stream'));
    }
}
