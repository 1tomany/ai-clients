<?php

namespace OneToMany\AI\Action\Query;

use OneToMany\AI\Contract\Action\Query\ExecuteQueryActionInterface;
use OneToMany\AI\Factory\QueryClientFactory;
use OneToMany\AI\Request\Query\ExecuteRequest;
use OneToMany\AI\Response\Query\ExecuteResponse;

final readonly class ExecuteQueryAction implements ExecuteQueryActionInterface
{
    public function __construct(private QueryClientFactory $queryClientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Contract\Action\Query\ExecuteQueryActionInterface
     */
    public function act(ExecuteRequest $request): ExecuteResponse
    {
        return $this->queryClientFactory->create($request)->execute($request);
    }
}
