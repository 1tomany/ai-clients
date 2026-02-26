<?php

namespace OneToMany\LlmSdk\Client\OpenAI;

use OneToMany\LlmSdk\Client\OpenAI\Type\Batch\Batch;
use OneToMany\LlmSdk\Contract\Client\BatchClientInterface;
use OneToMany\LlmSdk\Request\Batch\CreateRequest;
use OneToMany\LlmSdk\Response\Batch\CreateResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;

final readonly class BatchClient extends BaseClient implements BatchClientInterface
{
    /**
     * @see OneToMany\LlmSdk\Contract\Client\BatchClientInterface
     */
    public function create(CreateRequest $request): CreateResponse
    {
        $url = $this->generateUrl('batches');

        try {
            $response = $this->httpClient->request('POST', $url, [
                'auth_bearer' => $this->getApiKey(),
                'json' => [
                    'completion_window' => '24h',
                    'endpoint' => $request->getEndpoint(),
                    'input_file_id' => $request->getFileUri(),
                ],
            ]);

            $batch = $this->denormalizer->denormalize($response->toArray(true), Batch::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new CreateResponse($request->getModel(), $batch->id);
    }
}
