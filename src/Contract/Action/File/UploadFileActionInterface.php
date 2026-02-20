<?php

namespace OneToMany\LlmSdk\Contract\Action\File;

use OneToMany\LlmSdk\Request\File\UploadRequest;
use OneToMany\LlmSdk\Response\File\UploadResponse;

interface UploadFileActionInterface
{
    public function act(UploadRequest $request): UploadResponse;
}
