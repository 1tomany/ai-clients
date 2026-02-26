<?php

namespace OneToMany\LlmSdk\Contract\Client;

use OneToMany\LlmSdk\Request\Batch\CreateRequest;
use OneToMany\LlmSdk\Response\Batch\CreateResponse;

interface BatchClientInterface extends ClientInterface
{
    public function create(CreateRequest $request): CreateResponse;
}
