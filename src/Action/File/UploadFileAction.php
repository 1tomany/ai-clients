<?php

namespace OneToMany\AI\Clients\Action\File;

use OneToMany\AI\Clients\Contract\Action\File\UploadFileActionInterface;
use OneToMany\AI\Clients\Contract\Client\FileClientInterface;
use OneToMany\AI\Clients\Contract\Factory\ClientFactoryInterface;
use OneToMany\AI\Clients\Request\File\UploadRequest;
use OneToMany\AI\Clients\Response\File\UploadResponse;

final readonly class UploadFileAction implements UploadFileActionInterface
{
    /**
     * @param ClientFactoryInterface<FileClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Action\File\UploadFileActionInterface
     */
    public function act(UploadRequest $request): UploadResponse
    {
        return $this->clientFactory->create($request->getModel())->upload($request);
    }
}
