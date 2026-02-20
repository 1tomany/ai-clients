<?php

namespace OneToMany\AI\Clients\Action\Query;

use OneToMany\AI\Clients\Contract\Action\Query\ExecuteQueryActionInterface;
use OneToMany\AI\Clients\Contract\Client\QueryClientInterface;
use OneToMany\AI\Clients\Contract\Factory\ClientFactoryInterface;
use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Request\Query\ExecuteRequest;
use OneToMany\AI\Clients\Response\Query\ExecuteResponse;

final readonly class ExecuteQueryAction implements ExecuteQueryActionInterface
{
    /**
     * @param ClientFactoryInterface<QueryClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Action\Query\ExecuteQueryActionInterface
     */
    public function act(CompileRequest|ExecuteRequest $request): ExecuteResponse
    {
        $client = $this->clientFactory->create($request->getModel());

        if ($request instanceof CompileRequest) {
            $request = $client->compile($request)->toExecuteRequest();
        }

        return $client->execute($request);
    }
}
