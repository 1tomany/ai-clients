<?php

namespace OneToMany\LlmSdk\Action\File;

use OneToMany\LlmSdk\Contract\Action\File\UploadFileActionInterface;
use OneToMany\LlmSdk\Contract\Client\FileClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Request\File\UploadRequest;
use OneToMany\LlmSdk\Response\File\UploadResponse;

final readonly class UploadFileAction implements UploadFileActionInterface
{
    /**
     * @param ClientFactoryInterface<FileClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\File\UploadFileActionInterface
     */
    public function act(UploadRequest $request): UploadResponse
    {
        return $this->clientFactory->create($request->getModel())->upload($request);
    }
}
