<?php

namespace OneToMany\AI\Action\File;

use OneToMany\AI\Contract\Action\File\UploadFileActionInterface;
use OneToMany\AI\Factory\FileClientFactory;
use OneToMany\AI\Request\File\UploadRequest;
use OneToMany\AI\Response\File\UploadResponse;

final readonly class UploadFileAction implements UploadFileActionInterface
{
    public function __construct(private FileClientFactory $clientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Contract\Action\File\UploadFileActionInterface
     */
    public function act(UploadRequest $request): UploadResponse
    {
        return $this->clientFactory->create($request)->upload($request);
    }
}
