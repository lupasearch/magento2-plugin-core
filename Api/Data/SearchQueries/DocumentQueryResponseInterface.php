<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries;

interface DocumentQueryResponseInterface
{
    /**
     * Original search query text that the user has sent
     *
     * @return string
     */
    public function getSearchText(): string;

    /**
     * Total number of items that match the query
     *
     * @return int
     */
    public function getTotal(): int;

    /**
     * An array of search query results - documents with fields that match ones defined in Search Query's select fields.
     *
     * @return array<array{_relevance: int|null, ...}>
     */
    public function getItems(): array;

    /**
     * Original query size limit value, if defined
     *
     * @return int
     */
    public function getLimit(): int;

    /**
     * Original query offset value, if defined
     *
     * @return int
     */
    public function getOffset(): int;

    /**
     * Original sorting parameters.
     *
     * @return OrderedMapInterface[]
     */
    public function getSort(): array;

    /**
     * Returns similar queries, if such functionality is enabled.
     * Similar query response consists of suggested search phrases and a small subset of items that satisfy that query.
     * AI-generated similar query entry (indicated by its own flag aiSuggestions) contains empty search query text.
     *
     * @return OrderedMapInterface
     */
    public function getSimilarQueries(): OrderedMapInterface;

    /**
     * Facet result items, including original keys and labels
     *
     * @return OrderedMapInterface[]
     */
    public function getFacets(): array;

    /**
     * Returns A/B test decision for informational purposes, if such functionality is enabled.
     *
     * @return OrderedMapInterface
     */
    public function getAbTestDecision(): OrderedMapInterface;
}
