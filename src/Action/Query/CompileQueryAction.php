<?php

namespace OneToMany\LlmSdk\Action\Query;

use OneToMany\LlmSdk\Contract\Action\Query\CompileQueryActionInterface;
use OneToMany\LlmSdk\Contract\Client\QueryClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Exception\InvalidArgumentException;
use OneToMany\LlmSdk\Request\Query\CompileRequest;
use OneToMany\LlmSdk\Response\Query\CompileResponse;

final readonly class CompileQueryAction implements CompileQueryActionInterface
{
    /**
     * @param ClientFactoryInterface<QueryClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\Query\CompileQueryActionInterface
     *
     * @throws InvalidArgumentException the request does not have any components
     */
    public function act(CompileRequest $request): CompileResponse
    {
        if (!$request->hasComponents()) {
            throw new InvalidArgumentException('Compiling the query failed because no components have been added to it.');
        }

        return $this->clientFactory->create($request->getModel())->compile($request);
    }
}
