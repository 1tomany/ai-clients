<?php

namespace OneToMany\LlmSdk\Action\Batch;

use OneToMany\LlmSdk\Contract\Action\Batch\ReadBatchActionInterface;
use OneToMany\LlmSdk\Contract\Client\BatchClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Request\Batch\ReadRequest;
use OneToMany\LlmSdk\Response\Batch\ReadResponse;

final readonly class ReadBatchAction implements ReadBatchActionInterface
{
    /**
     * @param ClientFactoryInterface<BatchClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\Batch\ReadBatchActionInterface
     */
    public function act(ReadRequest $request): ReadResponse
    {
        return $this->clientFactory->create($request->getModel())->read($request);
    }
}
