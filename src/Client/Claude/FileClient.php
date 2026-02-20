<?php

namespace OneToMany\AI\Clients\Client\Claude;

use OneToMany\AI\Clients\Client\Claude\Type\File\DeletedFile;
use OneToMany\AI\Clients\Client\Claude\Type\File\File;
use OneToMany\AI\Clients\Contract\Client\FileClientInterface;
use OneToMany\AI\Clients\Request\File\DeleteRequest;
use OneToMany\AI\Clients\Request\File\UploadRequest;
use OneToMany\AI\Clients\Response\File\DeleteResponse;
use OneToMany\AI\Clients\Response\File\UploadResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

use function array_merge_recursive;

final readonly class FileClient extends ClaudeClient implements FileClientInterface
{
    /**
     * @see OneToMany\AI\Clients\Contract\Client\FileClientInterface
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
     * @see OneToMany\AI\Clients\Contract\Client\FileClientInterface
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        $url = $this->generateUrl('files', $request->getUri());

        try {
            $deletedFile = $this->denormalizer->denormalize($this->doRequest('DELETE', $url)->toArray(true), DeletedFile::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new DeleteResponse($request->getModel(), $deletedFile->id);
    }

    /**
     * @param 'GET'|'POST'|'PUT'|'DELETE' $method
     * @param non-empty-string $url
     * @param array<mixed> $options
     */
    protected function doRequest(string $method, string $url, array $options = []): ResponseInterface
    {
        $headers = [
            'headers' => [
                'anthropic-beta' => $this->getBetaHeader(),
            ],
        ];

        return parent::doRequest($method, $url, array_merge_recursive($headers, $options));
    }

    /**
     * @return non-empty-lowercase-string
     */
    private function getBetaHeader(): string
    {
        return 'files-api-2025-04-14';
    }
}
