<?php

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

interface SuggestionQueryConfigurationInterface extends QueryConfigurationInterface
{
    /**
     * @return string
     */
    public function getDocumentQueryKey(): string;

    /**
     * @param string $documentQueryKey
     * @return SuggestionQueryConfigurationInterface
     */
    public function setDocumentQueryKey(string $documentQueryKey): SuggestionQueryConfigurationInterface;

    /**
     * @return OrderedMapInterface[]
     */
    public function getFacets(): array;

    /**
     * @param OrderedMapInterface[] $facets
     * @return SuggestionQueryConfigurationInterface
     */
    public function setFacets(array $facets): SuggestionQueryConfigurationInterface;
}
