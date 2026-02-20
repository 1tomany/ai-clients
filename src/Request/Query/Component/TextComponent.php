<?php

namespace OneToMany\AI\Clients\Request\Query\Component;

use OneToMany\AI\Clients\Contract\Request\Query\Component\ComponentInterface;
use OneToMany\AI\Clients\Contract\Request\Query\Component\Enum\Role;

final readonly class TextComponent implements ComponentInterface
{
    /**
     * @param non-empty-string $text
     */
    public function __construct(
        private string $text,
        private Role $role = Role::User,
    ) {
    }

    /**
     * @return non-empty-string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Request\Query\Component\ComponentInterface
     */
    public function getRole(): Role
    {
        return $this->role;
    }
}
