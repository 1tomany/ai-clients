<?php

namespace OneToMany\AI\Clients\Contract\Action\File;

use OneToMany\AI\Clients\Request\File\UploadRequest;
use OneToMany\AI\Clients\Response\File\UploadResponse;

interface UploadFileActionInterface
{
    public function act(UploadRequest $request): UploadResponse;
}
