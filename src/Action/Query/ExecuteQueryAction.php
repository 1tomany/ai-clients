<?php

namespace OneToMany\LlmSdk\Action\Query;

use OneToMany\LlmSdk\Contract\Action\Query\ExecuteQueryActionInterface;
use OneToMany\LlmSdk\Contract\Client\QueryClientInterface;
use OneToMany\LlmSdk\Contract\Factory\ClientFactoryInterface;
use OneToMany\LlmSdk\Request\Query\CompileRequest;
use OneToMany\LlmSdk\Request\Query\ExecuteRequest;
use OneToMany\LlmSdk\Response\Query\ExecuteResponse;

final readonly class ExecuteQueryAction implements ExecuteQueryActionInterface
{
    /**
     * @param ClientFactoryInterface<QueryClientInterface> $clientFactory
     */
    public function __construct(private ClientFactoryInterface $clientFactory)
    {
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Action\Query\ExecuteQueryActionInterface
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
