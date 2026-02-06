<?php

namespace OneToMany\AI\Client\OpenAi\Type\File;

final readonly class DeletedFile
{
    /**
     * @param 'file' $object
     * @param non-empty-string $id
     */
    public function __construct(
        public string $object,
        public string $id,
        public bool $deleted,
    ) {
    }
}
