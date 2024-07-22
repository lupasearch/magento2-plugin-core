<?php

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryConfigurationInterface;

interface QueryConfigurationFactoryInterface
{
    /**
     * @param mixed[] $data
     * @return QueryConfigurationInterface<SearchQueryConfigurationInterface|SuggestionQueryConfigurationInterface>
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    public function create(array $data): QueryConfigurationInterface;

    public function createSuggestionQueryConfiguration(): SuggestionQueryConfigurationInterface;

    public function createSearchQueryConfiguration(): SearchQueryConfigurationInterface;
}
