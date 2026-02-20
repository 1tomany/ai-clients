<?php

namespace OneToMany\AI\Clients\Contract\Request\Query\Component;

use OneToMany\AI\Clients\Contract\Request\Query\Component\Enum\Role;

interface ComponentInterface
{
    public function getRole(): Role;
}
