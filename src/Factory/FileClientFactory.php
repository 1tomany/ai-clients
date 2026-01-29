<?php

namespace App\Prompt\Vendor\Model\Factory;

use App\Prompt\Vendor\Model\Contract\Client\FileClientInterface;
use App\Prompt\Vendor\Model\Factory\Trait\GetClientTrait;
use OneToMany\AI\Factory\Trait\GetClientTrait as TraitGetClientTrait;
use Psr\Container\ContainerInterface;

final readonly class FileClientFactory
{
    use TraitGetClientTrait;

    public function __construct(private ContainerInterface $clients)
    {
    }

    /**
     * @param non-empty-string $vendor
     */
    public function create(string $vendor): FileClientInterface
    {
        return $this->getClient($vendor, FileClientInterface::class);
    }
}
