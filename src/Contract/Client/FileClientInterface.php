<?php

namespace OneToMany\AI\Clients\Contract\Client;

use OneToMany\AI\Clients\Request\File\DeleteRequest;
use OneToMany\AI\Clients\Request\File\UploadRequest;
use OneToMany\AI\Clients\Response\File\DeleteResponse;
use OneToMany\AI\Clients\Response\File\UploadResponse;

interface FileClientInterface extends ClientInterface
{
    public function upload(UploadRequest $request): UploadResponse;

    public function delete(DeleteRequest $request): DeleteResponse;
}
