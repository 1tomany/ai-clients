<?php

namespace OneToMany\LlmSdk\Action\Batch;

use OneToMany\LlmSdk\Contract\Action\Batch\CreateBatchActionInterface;
use OneToMany\LlmSdk\Contract\Client\BatchClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Request\Batch\CreateRequest;
use OneToMany\LlmSdk\Response\Batch\CreateResponse;

final readonly class CreateBatchAction implements CreateBatchActionInterface
{
    /**
     * @param ClientFactoryInterface<BatchClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\Batch\CreateBatchActionInterface
     */
    public function act(CreateRequest $request): CreateResponse
    {
        return $this->clientFactory->create($request->getModel())->create($request);
    }
}
