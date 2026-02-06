<?php

use OneToMany\AI\Client\OpenAi\FileClient;
use OneToMany\AI\Client\OpenAi\QueryClient;
use OneToMany\AI\Request\File\DeleteRequest;
use OneToMany\AI\Request\File\UploadRequest;
use OneToMany\AI\Request\Query\CompileRequest;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

require_once __DIR__.'/vendor/autoload.php';

// Initialize the normalizers and serializer
$constructorExtractor = new ConstructorExtractor(...[
    'extractors' => [new PhpDocExtractor()],
]);

$typeExtractor = new PropertyInfoExtractor(...[
    'typeExtractors' => [$constructorExtractor],
]);

$objectNormalizer = new ObjectNormalizer(...[
    'propertyTypeExtractor' => $typeExtractor,
]);

$serializer = new Serializer([
    new BackedEnumNormalizer(),
    new DateTimeNormalizer(),
    new ArrayDenormalizer(),
    new UnwrappingDenormalizer(),
    $objectNormalizer,
]);

$httpClient = HttpClient::create();

$fileClient = new FileClient($serializer, $httpClient, getenv('OPENAI_API_KEY'));
// $response = $fileClient->upload(new UploadRequest('gpt-5-nano')->atPath('/Users/vic/Downloads/furnace-label.jpg')->withFormat('image/jpeg')->withPurpose('user_data'));
// print_r($response);
try {
$fileClient->delete(new DeleteRequest('gpt-5-nano', 'file-VGQ1uhQ8ignfcBBUbVfxap'));
} catch (\Throwable $e) {
    do {
        printf("[%s]: %s\n", get_class($e), $e->getMessage());
    } while ($e = $e->getPrevious());
}
exit;

$queryClient = new QueryClient($serializer, $httpClient, getenv('OPENAI_API_KEY'));

$compileRequest = new CompileRequest('gpt-5-nano')->withText('Who was the first president of the United States of America?');
$response = $queryClient->execute($queryClient->compile($compileRequest)->toExecuteRequest());

// print_r($response);
