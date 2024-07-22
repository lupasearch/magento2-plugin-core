<?php

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface;

interface QueriesFactoryInterface
{
    /**
     * @param mixed[] $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function create(array $data): QueriesInterface;
}
