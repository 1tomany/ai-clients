<?php

namespace OneToMany\AI\Contract\Request\Prompt\Content;

use OneToMany\AI\Contract\Request\Prompt\Content\Enum\Role;

interface ContentInterface
{
    public function getRole(): Role;
}
