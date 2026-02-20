<?php

namespace OneToMany\AI\Clients\Action\Query;

use OneToMany\AI\Clients\Contract\Action\Query\CompileQueryActionInterface;
use OneToMany\AI\Clients\Contract\Client\QueryClientInterface;
use OneToMany\AI\Clients\Contract\Factory\ClientFactoryInterface;
use OneToMany\AI\Clients\Exception\InvalidArgumentException;
use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Response\Query\CompileResponse;

final readonly class CompileQueryAction implements CompileQueryActionInterface
{
    /**
     * @param ClientFactoryInterface<QueryClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Action\Query\CompileQueryActionInterface
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
