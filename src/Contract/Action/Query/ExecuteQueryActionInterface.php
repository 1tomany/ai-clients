<?php

namespace OneToMany\AI\Clients\Contract\Action\Query;

use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Request\Query\ExecuteRequest;
use OneToMany\AI\Clients\Response\Query\ExecuteResponse;

interface ExecuteQueryActionInterface
{
    public function act(CompileRequest|ExecuteRequest $request): ExecuteResponse;
}
