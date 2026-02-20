<?php

namespace OneToMany\LlmSdk\Client\OpenAI;

use OneToMany\LlmSdk\Client\OpenAI\Type\Response\Input\Enum\Type as InputType;
use OneToMany\LlmSdk\Client\OpenAI\Type\Response\Response;
use OneToMany\LlmSdk\Contract\Client\QueryClientInterface;
use OneToMany\LlmSdk\Exception\RuntimeException;
use OneToMany\LlmSdk\Request\Query\CompileRequest;
use OneToMany\LlmSdk\Request\Query\Component\FileUriComponent;
use OneToMany\LlmSdk\Request\Query\Component\SchemaComponent;
use OneToMany\LlmSdk\Request\Query\Component\TextComponent;
use OneToMany\LlmSdk\Request\Query\ExecuteRequest;
use OneToMany\LlmSdk\Response\Query\CompileResponse;
use OneToMany\LlmSdk\Response\Query\ExecuteResponse;
use OneToMany\LlmSdk\Response\Query\UsageResponse;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface as HttpClientExceptionInterface;

final readonly class QueryClient extends BaseClient implements QueryClientInterface
{
    /**
     * @see OneToMany\LlmSdk\Contract\Client\QueryClientInterface
     */
    public function compile(CompileRequest $request): CompileResponse
    {
        $requestContent = [
            'model' => $request->getModel(),
            'input' => [],
        ];

        foreach ($request->getComponents() as $component) {
            if ($component instanceof TextComponent) {
                $inputType = InputType::InputText;

                $requestContent['input'][] = [
                    'content' => [
                        [
                            'type' => $inputType->getValue(),
                            'text' => $component->getText(),
                        ],
                    ],
                    'role' => $component->getRole()->getValue(),
                ];
            }

            if ($component instanceof FileUriComponent) {
                $inputType = InputType::InputFile;

                if ($component->isImage()) {
                    $inputType = InputType::InputImage;
                }

                $requestContent['input'][] = [
                    'content' => [
                        [
                            'type' => $inputType->getValue(),
                            'file_id' => $component->getUri(),
                        ],
                    ],
                    'role' => $component->getRole()->getValue(),
                ];
            }

            if ($component instanceof SchemaComponent) {
                $inputType = InputType::JsonSchema;

                $requestContent['text'] = [
                    'format' => [
                        'type' => $inputType->getValue(),
                        'name' => $component->getName(),
                        'schema' => $component->getSchema(),
                        'strict' => $component->isStrict(),
                    ],
                ];
            }
        }

        return new CompileResponse($request->getModel(), $this->generateUrl('responses'), $requestContent);
    }

    /**
     * @see OneToMany\LlmSdk\Contract\Client\QueryClientInterface
     */
    public function execute(ExecuteRequest $request): ExecuteResponse
    {
        $timer = new Stopwatch(true)->start('execute');

        try {
            $response = $this->httpClient->request('POST', $request->getUrl(), [
                'auth_bearer' => $this->getApiKey(),
                'json' => $request->getRequest(),
            ]);

            /**
             * @var array<string, mixed> $responseContent
             */
            $responseContent = $response->toArray(true);
        } catch (HttpClientExceptionInterface $e) {
            $this->handleHttpException($e);
        } finally {
            $timer->stop();
        }

        $output = $this->denormalizer->denormalize($responseContent, Response::class);

        if (null !== $output->error) {
            throw new RuntimeException($output->error->getMessage());
        }

        return new ExecuteResponse(
            $request->getModel(),
            $output->id,
            $output->getOutput(),
            $responseContent,
            $timer->getDuration(),
            new UsageResponse(
                $output->usage->getInputTokens(),
                $output->usage->getCachedTokens(),
                $output->usage->getOutputTokens(),
            ),
        );
    }
}
