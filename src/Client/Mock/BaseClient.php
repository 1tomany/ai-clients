<?php

namespace OneToMany\LlmSdk\Client\Mock;

use OneToMany\LlmSdk\Client\Trait\SupportsModelTrait;

use function bin2hex;
use function implode;
use function ltrim;
use function random_bytes;
use function sprintf;
use function strtolower;

abstract readonly class BaseClient
{
    use SupportsModelTrait;

    protected \Faker\Generator $faker;

    public const string BASE_URI = 'https://mock-llm.service/api';

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Client\ClientInterface
     *
     * @return non-empty-list<non-empty-lowercase-string>
     */
    public function getSupportedModels(): array
    {
        return ['mock'];
    }

    /**
     * @param non-empty-string $prefix
     * @param positive-int $suffixLength
     *
     * @return non-empty-lowercase-string
     */
    protected function generateResponseId(string $prefix, int $suffixLength = 4): string
    {
        return strtolower(sprintf('%s_%s', $prefix, bin2hex(random_bytes($suffixLength))));
    }

    /**
     * @param non-empty-string $paths
     *
     * @return non-empty-string
     */
    protected function generateUrl(string ...$paths): string
    {
        return sprintf('%s/%s', self::BASE_URI, ltrim(implode('/', $paths), '/'));
    }
}
