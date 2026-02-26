<?php

namespace OneToMany\LlmSdk\Client\OpenAI;

use OneToMany\LlmSdk\Client\OpenAI\Type\File\DeletedFile;
use OneToMany\LlmSdk\Client\OpenAI\Type\File\Enum\Purpose;
use OneToMany\LlmSdk\Client\OpenAI\Type\File\File;
use OneToMany\LlmSdk\Contract\Client\FileClientInterface;
use OneToMany\LlmSdk\Request\File\DeleteRequest;
use OneToMany\LlmSdk\Request\File\UploadRequest;
use OneToMany\LlmSdk\Response\File\DeleteResponse;
use OneToMany\LlmSdk\Response\File\UploadResponse;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;

final readonly class FileClient extends BaseClient implements FileClientInterface
{
    /**
     * @see OneToMany\LlmSdk\Contract\Client\FileClientInterface
     */
    public function upload(UploadRequest $request): UploadResponse
    {
        $url = $this->generateUrl('files');

        try {
            $purpose = Purpose::create($request->getPurpose());

            $response = $this->doRequest('POST', $url, [
                'body' => [
                    'purpose' => $purpose->getValue(),
                    'file' => $request->openFileHandle(),
                ],
            ]);

            $file = $this->denormalizer->denormalize($response->toArray(), File::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new UploadResponse($request->getModel(), $file->id, $file->filename, $file->purpose->getValue(), $file->getExpiresAt());
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Client\FileClientInterface
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        $url = $this->generateUrl('files', $request->getUri());

        try {
            $response = $this->doRequest('DELETE', $url, [
                'timeout' => 60.0,
            ]);

            $deletedFile = $this->denormalizer->denormalize($response->toArray(), DeletedFile::class);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        }

        return new DeleteResponse($request->getModel(), $deletedFile->id);
    }
}
