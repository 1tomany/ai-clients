<?php

use OneToMany\AI\Client\Claude\FileClient;
use OneToMany\AI\Request\File\UploadRequest;
use Symfony\Component\HttpClient\HttpClient;

$serializer = require __DIR__.'/../serializer.php';

$apiKeyEnvVar = 'CLAUDE_API_KEY';

if (!$apiKey = getenv($apiKeyEnvVar)) {
    printf("Set the %s environment variable to continue.\n", $apiKeyEnvVar);
    exit(1);
}

$filePath = $argv[1] ?? null;

if (!is_string($filePath) || !is_file($filePath)) {
    printf("Usage: php %s <file-path>\n", basename(__FILE__));
}

$fileClient = new FileClient($serializer, HttpClient::create(), $apiKey);

$response = $fileClient->upload(new UploadRequest('claude-opus-4-6')->atPath($filePath));

print_r($response);
