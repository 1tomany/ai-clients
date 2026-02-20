<?php

namespace OneToMany\AI\Clients\Contract\Client;

use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Request\Query\ExecuteRequest;
use OneToMany\AI\Clients\Response\Query\CompileResponse;
use OneToMany\AI\Clients\Response\Query\ExecuteResponse;

interface QueryClientInterface extends ClientInterface
{
    public function compile(CompileRequest $request): CompileResponse;

    public function execute(ExecuteRequest $request): ExecuteResponse;
}
