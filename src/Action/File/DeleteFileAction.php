<?php

namespace OneToMany\AI\Clients\Action\File;

use OneToMany\AI\Clients\Contract\Action\File\DeleteFileActionInterface;
use OneToMany\AI\Clients\Contract\Client\FileClientInterface;
use OneToMany\AI\Clients\Contract\Factory\ClientFactoryInterface;
use OneToMany\AI\Clients\Request\File\DeleteRequest;
use OneToMany\AI\Clients\Response\File\DeleteResponse;

final readonly class DeleteFileAction implements DeleteFileActionInterface
{
    /**
     * @param ClientFactoryInterface<FileClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Action\File\DeleteFileActionInterface
     */
    public function act(DeleteRequest $request): DeleteResponse
    {
        return $this->clientFactory->create($request->getModel())->delete($request);
    }
}
