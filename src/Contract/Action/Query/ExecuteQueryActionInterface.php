<?php

namespace OneToMany\LlmSdk\Contract\Action\Query;

use OneToMany\LlmSdk\Request\Query\CompileRequest;
use OneToMany\LlmSdk\Request\Query\ExecuteRequest;
use OneToMany\LlmSdk\Response\Query\ExecuteResponse;

interface ExecuteQueryActionInterface
{
    public function act(CompileRequest|ExecuteRequest $request): ExecuteResponse;
}
