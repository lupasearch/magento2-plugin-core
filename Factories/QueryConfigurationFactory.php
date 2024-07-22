<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryConfigurationInterfaceFactory;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryConfigurationInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryConfigurationInterfaceFactory;
use LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries\SuggestionQueryConfiguration;

class QueryConfigurationFactory implements QueryConfigurationFactoryInterface
{
    private SuggestionQueryConfigurationInterfaceFactory $suggestionQueryConfigurationFactory;

    private SearchQueryConfigurationInterfaceFactory $searchQueryConfigurationFactory;

    public function __construct(
        SuggestionQueryConfigurationInterfaceFactory $suggestionQueryConfigurationFactory,
        SearchQueryConfigurationInterfaceFactory $searchQueryConfigurationFactory
    ) {
        $this->suggestionQueryConfigurationFactory = $suggestionQueryConfigurationFactory;
        $this->searchQueryConfigurationFactory = $searchQueryConfigurationFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): QueryConfigurationInterface
    {
        $isSearchConfiguration = isset($data['queryFields']);

        return $isSearchConfiguration ? $this->createSearchQueryConfigurationFromData(
            $data
        ) : $this->createSuggestionQueryConfigurationFromData($data);
    }

    public function createSuggestionQueryConfiguration(): SuggestionQueryConfigurationInterface
    {
        return $this->createSuggestionQueryConfigurationFromData([]);
    }

    public function createSearchQueryConfiguration(): SearchQueryConfigurationInterface
    {
        return $this->createSearchQueryConfigurationFromData([]);
    }

    /**
     * @param array<mixed> $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    private function createSuggestionQueryConfigurationFromData(array $data): SuggestionQueryConfiguration
    {
        $suggestionQueryConfiguration = $this->suggestionQueryConfigurationFactory->create();
        $suggestionQueryConfiguration->setLimit((int)($data['limit'] ?? 0));

        $facets = [];

        foreach ($data['facets']['facets'] ?? [] as $value) {
            $facets[] = OrderedMapFactory::create($value);
        }

        $suggestionQueryConfiguration->setFacets($facets);

        $suggestionQueryConfiguration->setDocumentQueryKey($data['facets']['documentQueryKey'] ?? '');

        return $suggestionQueryConfiguration;
    }

    /**
     * @param array<mixed> $data
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.DisallowMixedTypeHint.DisallowedMixedTypeHint
     */
    // phpcs:ignore SlevomatCodingStandard.Functions.FunctionLength.FunctionLength
    private function createSearchQueryConfigurationFromData(array $data): SearchQueryConfigurationInterface
    {
        $searchQueryConfiguration = $this->searchQueryConfigurationFactory->create();
        $searchQueryConfiguration->setQueryFields(OrderedMapFactory::create($data['queryFields'] ?? []));
        $searchQueryConfiguration->setPriorityFields(OrderedMapFactory::create($data['priorityFields'] ?? []));
        $searchQueryConfiguration->setMatch($data['match'] ?? '');
        $searchQueryConfiguration->setBoostPhrase(OrderedMapFactory::create($data['boostPhrase'] ?? []));
        $searchQueryConfiguration->setBoost(OrderedMapFactory::create(array_filter($data['boost'] ?? [])));
        $searchQueryConfiguration->setDidYouMean(OrderedMapFactory::create($data['didYouMean'] ?? []));
        $searchQueryConfiguration->setSimilarQueries(OrderedMapFactory::create($data['similarQueries'] ?? []));
        $searchQueryConfiguration->setSimilarResults(OrderedMapFactory::create($data['similarResults'] ?? []));
        $searchQueryConfiguration->setAiSynonyms(OrderedMapFactory::create($data['aiSynonyms'] ?? []));
        $searchQueryConfiguration->setSelectFields($data['selectFields'] ?? []);
        $searchQueryConfiguration->setSelectableFields($data['selectableFields'] ?? []);
        $searchQueryConfiguration->setFilters(OrderedMapFactory::create($data['filters'] ?? []));
        $searchQueryConfiguration->setFilterableFields($data['filterableFields'] ?? []);
        $searchQueryConfiguration->setOffset((int)($data['offset'] ?? 0));
        $searchQueryConfiguration->setLimit((int)($data['limit'] ?? 0));

        $sort = [];

        foreach ($data['sort'] ?? [] as $value) {
            $sort[] = OrderedMapFactory::create($value);
        }

        $searchQueryConfiguration->setSort($sort);

        $facets = [];

        foreach ($data['facets'] ?? [] as $value) {
            $facets[] = OrderedMapFactory::create($value);
        }

        $searchQueryConfiguration->setFacets($facets);

        $searchQueryConfiguration->setDynamicFacets(OrderedMapFactory::create($data['dynamicFacets'] ?? []));
        $searchQueryConfiguration->setFilters(OrderedMapFactory::create($data['filters'] ?? []));
        $searchQueryConfiguration->setExclusionFilters(OrderedMapFactory::create($data['exclusionFilters'] ?? []));
        $searchQueryConfiguration->setStatisticalBoost(OrderedMapFactory::create($data['statisticalBoost'] ?? []));
        $searchQueryConfiguration->setPersonalization(OrderedMapFactory::create($data['personalization'] ?? []));
        $searchQueryConfiguration->setCollapse(OrderedMapFactory::create($data['collapse'] ?? []));
        $searchQueryConfiguration->setExactTotalCount($data['exactTotalCount'] ?? false);
        $searchQueryConfiguration->setExactMatchMultiplier((float)($data['exactMatchMultiplier'] ?? 1));

        return $searchQueryConfiguration;
    }
}
