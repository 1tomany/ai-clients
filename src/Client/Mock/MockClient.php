<?php

namespace OneToMany\AI\Clients\Client\Mock;

use OneToMany\AI\Clients\Client\Trait\SupportsModelTrait;

use function bin2hex;
use function random_bytes;
use function sprintf;
use function strtolower;

abstract readonly class MockClient
{
    use SupportsModelTrait;

    protected \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Client\ClientInterface
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
}
