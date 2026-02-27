<?php

namespace OneToMany\LlmSdk\Contract\Action\Batch;

use OneToMany\LlmSdk\Request\Batch\CreateRequest;
use OneToMany\LlmSdk\Response\Batch\CreateResponse;

interface CreateBatchActionInterface
{
    public function act(CreateRequest $request): CreateResponse;
}
