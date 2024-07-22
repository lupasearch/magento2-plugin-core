<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryResponseInterface;

interface SuggestionQueryResponseFactoryInterface
{
    /**
     * @param mixed[] $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function create(array $data): SuggestionQueryResponseInterface;
}
