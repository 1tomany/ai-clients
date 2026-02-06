<?php

namespace OneToMany\AI\Client\OpenAi\Type\Response\Output;

use OneToMany\AI\Client\OpenAi\Type\Response\Enum\Role;
use OneToMany\AI\Client\OpenAi\Type\Response\Enum\Status;
use OneToMany\AI\Client\OpenAi\Type\Response\Output\Enum\Type;

final readonly class OutputType
{
    /**
     * @param non-empty-string $id
     */
    public function __construct(
        public Type $type,
        public string $id,
        public Status $status,
        public Role $role,
        public ?array $content = null,
    ) {
    }
}
