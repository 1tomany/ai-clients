<?php

require_once __DIR__.'/../vendor/autoload.php';

use OneToMany\AI\Client\Gemini\Serializer\PromptNormalizer as GeminiPromptNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

function createSerializer(): Serializer
{
    $classMetadataFactory = new ClassMetadataFactory(...[
        'loader' => new AttributeLoader(true, []),
    ]);

    $metadataAwareNameConverter = new MetadataAwareNameConverter(...[
        'metadataFactory' => $classMetadataFactory,
    ]);

    // Construct the Symfony Normalizers and Denormalizers
    $propertyInfoExtractor = new PropertyInfoExtractor([], [
        new ConstructorExtractor([new PhpDocExtractor()]),
    ]);

    $serializer = new Serializer([
        new ArrayDenormalizer(),
        new BackedEnumNormalizer(),
        new DateTimeNormalizer(),
        new UnwrappingDenormalizer(),

        new GeminiPromptNormalizer(),

        // This must come last so the denormalizer injected into the client can use the UnwrappingDenormalizer
        new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $propertyInfoExtractor),
    ]);

    return $serializer;
}

// // Initialize the normalizers and serializer
//         $constructorExtractor = new ConstructorExtractor(...[
//             'extractors' => [new PhpDocExtractor()]
//         ]);

//         $typeExtractor = new PropertyInfoExtractor(...[
//             'typeExtractors' => [$constructorExtractor]
//         ]);

//         $objectNormalizer = new ObjectNormalizer(...[
//             'propertyTypeExtractor' => $typeExtractor
//         ]);

//         $this->serializer = new Serializer([
//             new BackedEnumNormalizer(),
//             new DateTimeNormalizer(),
//             new ArrayDenormalizer(),
//             $objectNormalizer,
//         ]);
