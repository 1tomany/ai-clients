<?php

namespace OneToMany\LlmSdk\Client\Mock;

use OneToMany\LlmSdk\Contract\Client\BatchClientInterface;
use OneToMany\LlmSdk\Request\Batch\CreateRequest;
use OneToMany\LlmSdk\Request\Batch\ReadRequest;
use OneToMany\LlmSdk\Response\Batch\CreateResponse;
use OneToMany\LlmSdk\Response\Batch\ReadResponse;

final readonly class BatchClient extends BaseClient implements BatchClientInterface
{
    /**
     * @see OneToMany\LlmSdk\Contract\Client\BatchClientInterface
     */
    public function create(CreateRequest $request): CreateResponse
    {
        return new CreateResponse($request->getModel(), $this->generateResponseId('batch'));
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Client\BatchClientInterface
     */
    public function read(ReadRequest $request): ReadResponse
    {
        throw new \Exception('Not implemented');
    }
}
