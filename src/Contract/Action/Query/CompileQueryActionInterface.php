<?php

namespace OneToMany\AI\Clients\Contract\Action\Query;

use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Response\Query\CompileResponse;

interface CompileQueryActionInterface
{
    public function act(CompileRequest $request): CompileResponse;
}
