<?php

namespace OneToMany\AI\Client\OpenAi;

use OneToMany\AI\Exception\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use function trim;

abstract readonly class BaseClient
{
    protected HttpClientInterface $httpClient;

    /**
     * @param ?non-empty-string $openaiApiKey
     *
     * @throws InvalidArgumentException both the `$openaiApiKey` and `$httpClient` arguments are null
     */
    public function __construct(
        ?string $openaiApiKey,
        ?HttpClientInterface $httpClient,
        protected DenormalizerInterface $denormalizer,
    ) {
        $openaiApiKey = trim($openaiApiKey ?? '');

        if (empty($openaiApiKey) && null === $httpClient) {
            throw new InvalidArgumentException('Constructing an OpenAI client requires either an API key or scoped HTTP client, but neither were provided.');
        }

        if (null === $httpClient) {
            $httpClient = HttpClient::create([
                'auth_bearer' => $openaiApiKey,
                'headers' => [
                    'accept' => 'application/json',
                ],
            ]);
        }

        $this->httpClient = $httpClient;
    }
}
