<?php

namespace OneToMany\LlmSdk\Contract\Action\Query;

use OneToMany\LlmSdk\Request\Query\CompileRequest;
use OneToMany\LlmSdk\Response\Query\CompileResponse;

interface CompileQueryActionInterface
{
    public function act(CompileRequest $request): CompileResponse;
}
