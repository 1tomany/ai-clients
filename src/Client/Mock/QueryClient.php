<?php

namespace OneToMany\AI\Clients\Client\Mock;

use OneToMany\AI\Clients\Contract\Client\QueryClientInterface;
use OneToMany\AI\Clients\Request\Query\CompileRequest;
use OneToMany\AI\Clients\Request\Query\Component\FileUriComponent;
use OneToMany\AI\Clients\Request\Query\Component\SchemaComponent;
use OneToMany\AI\Clients\Request\Query\Component\TextComponent;
use OneToMany\AI\Clients\Request\Query\ExecuteRequest;
use OneToMany\AI\Clients\Response\Query\CompileResponse;
use OneToMany\AI\Clients\Response\Query\ExecuteResponse;

use function json_encode;
use function random_int;

final readonly class QueryClient extends MockClient implements QueryClientInterface
{
    /**
     * @see OneToMany\AI\Clients\Contract\Client\QueryClientInterface
     */
    public function compile(CompileRequest $request): CompileResponse
    {
        $requestContent = [
            'model' => $request->getModel(),
        ];

        foreach ($request->getComponents() as $component) {
            if ($component instanceof TextComponent) {
                $requestContent['contents'][] = [
                    'text' => $component->getText(),
                    'role' => $component->getRole()->getValue(),
                ];
            }

            if ($component instanceof FileUriComponent) {
                $requestContent['contents'][] = [
                    'fileUri' => $component->getUri(),
                ];
            }

            if ($component instanceof SchemaComponent) {
                $requestContent['schema'] = [
                    'name' => $component->getName(),
                    'schema' => $component->getSchema(),
                    'format' => $component->getFormat(),
                ];
            }
        }

        return new CompileResponse($request->getModel(), 'https://mock-llm.service/api/generate', $requestContent);
    }

    /**
     * @see OneToMany\AI\Clients\Contract\Client\QueryClientInterface
     */
    public function execute(ExecuteRequest $request): ExecuteResponse
    {
        $id = $this->generateResponseId('query');

        /** @var non-empty-string $output */
        $output = json_encode(['tag' => $this->faker->word(), 'summary' => $this->faker->sentence(10)]);

        return new ExecuteResponse($request->getModel(), $id, $output, ['id' => $id, 'output' => $output], random_int(100, 10000));
    }
}
