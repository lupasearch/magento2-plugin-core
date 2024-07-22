<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model;

use LupaSearch\LupaClientInterface;

interface LupaClientFactoryInterface
{
    public function create(?int $storeId = null): LupaClientInterface;
}
