<?php

namespace OneToMany\LlmSdk\Action\File;

use OneToMany\LlmSdk\Contract\Action\File\DeleteFileActionInterface;
use OneToMany\LlmSdk\Contract\Client\FileClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Request\File\DeleteRequest;
use OneToMany\LlmSdk\Response\File\DeleteResponse;

final readonly class DeleteFileAction implements DeleteFileActionInterface
{
    /**
     * @param ClientFactoryInterface<FileClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\File\DeleteFileActionInterface
     */
    public function act(DeleteRequest $request): DeleteResponse
    {
        return $this->clientFactory->create($request->getModel())->delete($request);
    }
}
