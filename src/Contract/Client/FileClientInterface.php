<?php

namespace OneToMany\AI\Contract\Client;

use OneToMany\AI\Contract\Request\File\CacheFileRequestInterface;
use OneToMany\AI\Contract\Response\File\CachedFileResponseInterface;

interface FileClientInterface
{
    public function cache(CacheFileRequestInterface $request): CachedFileResponseInterface;
}
