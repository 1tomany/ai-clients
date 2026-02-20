<?php

namespace OneToMany\AI\Clients\Contract\Action\File;

use OneToMany\AI\Clients\Request\File\DeleteRequest;
use OneToMany\AI\Clients\Response\File\DeleteResponse;

interface DeleteFileActionInterface
{
    public function act(DeleteRequest $request): DeleteResponse;
}
