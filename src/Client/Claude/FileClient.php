<?php

namespace OneToMany\AI\Client\Claude;

use OneToMany\AI\Client\Claude\Type\File\File;
use OneToMany\AI\Contract\Client\FileClientInterface;
use OneToMany\AI\Exception\RuntimeException;
use OneToMany\AI\Request\File\DeleteRequest;
use OneToMany\AI\Request\File\UploadRequest;
use OneToMany\AI\Response\File\DeleteResponse;
use OneToMany\AI\Response\File\UploadResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

use function array_merge_recursive;

final readonly class FileClient extends ClaudeClient implements FileClientInterface
{
    /**
     * @see OneToMany\AI\Contract\Client\FileClientInterface
     */
    public function upload(UploadRequest $request): UploadResponse
    {
        $url = $this->generateUrl('files');

        try {
            $response = $this->doRequest('POST', $url, [
                'body' => [
                    'file' => $request->openFileHandle(),
                ],
            ]);

            $file = $this->denormalizer->denormalize($response->toArray(true), File::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new UploadResponse($request->getModel(), $file->id, $file->filename);
    }

    /**
     * @see OneToMany\AI\Contract\Client\FileClientInterface
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        /*
        $url = $this->generateUrl('files', $request->getUri());

        try {
            $response = $this->httpClient->request('DELETE', $url, [
                'auth_bearer' => $this->getApiKey(),
            ]);

            $deletedFile = $this->denormalizer->denormalize($response->toArray(true), DeletedFile::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new DeleteResponse($request->getModel(), $deletedFile->id);
        */

        throw new RuntimeException('Not implemented!');
    }

    protected function doRequest(string $method, string $uri, array $options): ResponseInterface
    {
        $options = array_merge_recursive($options, [
            'headers' => [
                'anthropic-beta' => 'files-api-2025-04-14',
            ],
        ]);

        return parent::doRequest($method, $uri, $options);
    }

    /**
     * @return non-empty-lowercase-string
     */
    private function getBetaHeader(): string
    {
        return 'files-api-2025-04-14';
    }
}
