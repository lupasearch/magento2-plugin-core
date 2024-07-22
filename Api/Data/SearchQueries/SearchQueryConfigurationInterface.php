<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

interface SearchQueryConfigurationInterface extends QueryConfigurationInterface
{
    /**
     * @return OrderedMapInterface
     */
    public function getQueryFields(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $queryFields
     * @return SearchQueryConfigurationInterface
     */
    public function setQueryFields(OrderedMapInterface $queryFields): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getPriorityFields(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $priorityFields
     * @return SearchQueryConfigurationInterface
     */
    public function setPriorityFields(OrderedMapInterface $priorityFields): SearchQueryConfigurationInterface;

    /**
     * @return string
     */
    public function getMatch(): string;

    /**
     * @param string $match
     * @return SearchQueryConfigurationInterface
     */
    public function setMatch(string $match): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getBoostPhrase(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $boostPhrase
     * @return SearchQueryConfigurationInterface
     */
    public function setBoostPhrase(OrderedMapInterface $boostPhrase): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getBoost(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $boost
     * @return SearchQueryConfigurationInterface
     */
    public function setBoost(OrderedMapInterface $boost): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getDidYouMean(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $didYouMean
     * @return SearchQueryConfigurationInterface
     */
    public function setDidYouMean(OrderedMapInterface $didYouMean): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getSimilarQueries(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $similarQueries
     * @return SearchQueryConfigurationInterface
     */
    public function setSimilarQueries(OrderedMapInterface $similarQueries): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getSimilarResults(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $similarResults
     * @return SearchQueryConfigurationInterface
     */
    public function setSimilarResults(OrderedMapInterface $similarResults): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getAiSynonyms(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $aiSynonyms
     * @return SearchQueryConfigurationInterface
     */
    public function setAiSynonyms(OrderedMapInterface $aiSynonyms): SearchQueryConfigurationInterface;

    /**
     * @return string[]
     */
    public function getSelectFields(): array;

    /**
     * @param string[] $selectFields
     * @return SearchQueryConfigurationInterface
     */
    public function setSelectFields(array $selectFields): SearchQueryConfigurationInterface;

    /**
     * @return string[]
     */
    public function getSelectableFields(): array;

    /**
     * @param string[] $selectableFields
     * @return SearchQueryConfigurationInterface
     */
    public function setSelectableFields(array $selectableFields): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface[]
     */
    public function getFacets(): array;

    /**
     * @param OrderedMapInterface[] $facets
     * @return SearchQueryConfigurationInterface
     */
    public function setFacets(array $facets): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getDynamicFacets(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $dynamicFacets
     * @return SearchQueryConfigurationInterface
     */
    public function setDynamicFacets(OrderedMapInterface $dynamicFacets): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getFilters(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $filters
     * @return SearchQueryConfigurationInterface
     */
    public function setFilters(OrderedMapInterface $filters): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getExclusionFilters(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $exclusionFilters
     * @return SearchQueryConfigurationInterface
     */
    public function setExclusionFilters(OrderedMapInterface $exclusionFilters): SearchQueryConfigurationInterface;

    /**
     * @return string[]
     */
    public function getFilterableFields(): array;

    /**
     * @param string[] $filterableFields
     * @return SearchQueryConfigurationInterface
     */
    public function setFilterableFields(array $filterableFields): SearchQueryConfigurationInterface;

    /**
     * @return int
     */
    public function getOffset(): int;

    /**
     * @param int $offset
     * @return SearchQueryConfigurationInterface
     */
    public function setOffset(int $offset): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface[]
     */
    public function getSort(): array;

    /**
     * @param OrderedMapInterface[] $sort
     * @return SearchQueryConfigurationInterface
     */
    public function setSort(array $sort): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getStatisticalBoost(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $statisticalBoost
     * @return SearchQueryConfigurationInterface
     */
    public function setStatisticalBoost(OrderedMapInterface $statisticalBoost): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getPersonalization(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $personalization
     * @return SearchQueryConfigurationInterface
     */
    public function setPersonalization(OrderedMapInterface $personalization): SearchQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface
     */
    public function getCollapse(): OrderedMapInterface;

    /**
     * @param OrderedMapInterface $collapse
     * @return SearchQueryConfigurationInterface
     */
    public function setCollapse(OrderedMapInterface $collapse): SearchQueryConfigurationInterface;

    /**
     * @return bool
     */
    public function isExactTotalCount(): bool;

    /**
     * @param bool $exactTotalCount
     * @return SearchQueryConfigurationInterface
     */
    public function setExactTotalCount(bool $exactTotalCount): SearchQueryConfigurationInterface;

    /**
     * @return float
     */
    public function getExactMatchMultiplier(): float;

    /**
     * @param float $exactMatchMultiplier
     * @return SearchQueryConfigurationInterface
     */
    public function setExactMatchMultiplier(float $exactMatchMultiplier): SearchQueryConfigurationInterface;
}
