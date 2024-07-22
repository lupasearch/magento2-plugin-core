<?php

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;

interface SearchQueryFactoryInterface
{
    /**
     * @param mixed[] $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function create(array $data): SearchQueryInterface;
}
