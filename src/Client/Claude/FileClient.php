<?php

namespace OneToMany\LlmSdk\Client\Claude;

use OneToMany\LlmSdk\Client\Claude\Type\File\DeletedFile;
use OneToMany\LlmSdk\Client\Claude\Type\File\File;
use OneToMany\LlmSdk\Contract\Client\FileClientInterface;
use OneToMany\LlmSdk\Request\File\DeleteRequest;
use OneToMany\LlmSdk\Request\File\UploadRequest;
use OneToMany\LlmSdk\Response\File\DeleteResponse;
use OneToMany\LlmSdk\Response\File\UploadResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

use function array_merge_recursive;

final readonly class FileClient extends BaseClient implements FileClientInterface
{
    /**
     * @see OneToMany\LlmSdk\Contract\Client\FileClientInterface
     */
    public function upload(UploadRequest $request): UploadResponse
    {
        $url = $this->generateUrl('files');

        $response = $this->doRequest('POST', $url, [
            'body' => [
                'file' => $request->openFileHandle(),
            ],
        ]);

        $file = $this->denormalizer->denormalize($response->toArray(true), File::class);

        return new UploadResponse($request->getModel(), $file->id, $file->filename);
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Client\FileClientInterface
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
