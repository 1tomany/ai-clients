<?php

namespace OneToMany\LlmSdk\Contract\Request\Query\Component;

use OneToMany\LlmSdk\Contract\Request\Query\Component\Enum\Role;

interface ComponentInterface
{
    public function getRole(): Role;
}
