<?php

use OneToMany\AI\Client\Gemini\FileClient;
use OneToMany\AI\Client\Gemini\PromptClient;
use OneToMany\AI\Contract\Exception\ExceptionInterface as AiExceptionInterface;
use OneToMany\AI\Request\File\CacheFileRequest;
use OneToMany\AI\Request\Prompt\CompilePromptRequest;
use OneToMany\AI\Request\Prompt\Content\CachedFile;
use OneToMany\AI\Request\Prompt\Content\InputText;
use Symfony\Component\HttpClient\HttpClient;

require_once __DIR__.'/../bootstrap.php';

$keyVar = 'GEMINI_API_KEY';

if (!$googApiKey = getenv($keyVar)) {
    printf("Set the %s environment variable to continue.\n", $keyVar);
    exit(1);
}

if (!is_string($argv[1] ?? null)) {
    printf("Usage: php %s <file-path>\n", basename(__FILE__));
    exit(1);
}

$path = realpath($argv[1]);

if (!$path || !is_file($path) || !is_readable($path)) {
    printf("The file '%s' is not a file or not readable.\n", $path);
    exit(1);
}

$httpClient = HttpClient::create([
    'headers' => [
        'accept' => 'application/json',
        'x-goog-api-key' => $geminiApiKey,
    ],
]);

$serializer = createSerializer();

try {
    // Construct the Gemini FileClient
    $fileClient = new FileClient(null, $httpClient, $serializer);

    // Create the request to cache the file with Gemini
    $cacheFileRequest = CacheFileRequest::create('gemini', $path);

    // Cache the file with Gemini
    $cachedFile = $fileClient->cache(...[
        'request' => $cacheFileRequest,
    ]);

    // Construct the Gemini PromptClient
    $promptClient = new PromptClient(null, $httpClient, $serializer);

    // Create the system prompt text
    $systemInputText = InputText::system(implode(' ', [
        'First, select a tag that most accurately describes the file.',
        'Then, write a short five to ten word summary of the file.',
    ]));

    $compilePromptRequest = new CompilePromptRequest('gemini', 'gemini-2.5-flash-lite', [
        $systemInputText, new CachedFile($cachedFile->getUri()),
    ]);

    $compilePromptRequest->addContent($systemInputText);

    $promptClient->compile($compilePromptRequest);
} catch (AiExceptionInterface $e) {
    printf("[ERROR] %s\n", $e->getMessage());
    exit(1);
}

printf("URI: %s\n", $cachedFile->getUri());
printf("Name: %s\n", $cachedFile->getName());

if ($expiresAt = $cachedFile->getExpiresAt()) {
    printf("ExpiresAt: %s\n", $expiresAt->format('c'));
}
