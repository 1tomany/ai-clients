<?php

namespace OneToMany\AI\Clients\Client\Mock;

use OneToMany\AI\Clients\Contract\Client\FileClientInterface;
use OneToMany\AI\Clients\Request\File\DeleteRequest;
use OneToMany\AI\Clients\Request\File\UploadRequest;
use OneToMany\AI\Clients\Response\File\DeleteResponse;
use OneToMany\AI\Clients\Response\File\UploadResponse;

final readonly class FileClient extends MockClient implements FileClientInterface
{
    /**
     * @see OneToMany\AI\Clients\Contract\Client\FileClientInterface
     */
    public function upload(UploadRequest $request): UploadResponse
    {
        return new UploadResponse($request->getModel(), $this->generateResponseId('file'));
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Client\FileClientInterface
     */
    public function delete(DeleteRequest $request): DeleteResponse
    {
        return new DeleteResponse($request->getModel(), $request->getUri());
    }
}
