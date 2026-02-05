<?php

namespace OneToMany\AI\Action\Query;

use OneToMany\AI\Contract\Action\Query\CompileQueryActionInterface;
use OneToMany\AI\Exception\InvalidArgumentException;
use OneToMany\AI\Factory\QueryClientFactory;
use OneToMany\AI\Request\Query\CompileRequest;
use OneToMany\AI\Response\Query\CompileResponse;

final readonly class CompileQueryAction implements CompileQueryActionInterface
{
    public function __construct(private QueryClientFactory $queryClientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Contract\Action\Query\CompileQueryActionInterface
     *
     * @throws InvalidArgumentException the request does not have any components
     */
    public function act(CompileRequest $request): CompileResponse
    {
        if (!$request->hasComponents()) {
            throw new InvalidArgumentException('Compiling a query requires one more more components.');
        }

        return $this->queryClientFactory->create($request)->compile($request);
    }
}
