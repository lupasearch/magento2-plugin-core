<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Api;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;
use LupaSearch\Exceptions\ApiException;

interface SearchQueriesApiInterface
{
    /**
     * @param string $indexId
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface|null
     * @throws ApiException
     */
    public function getSearchQueries(string $indexId): ?QueriesInterface;

    /**
     * @param string $indexId
     * @param \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface $searchQuery
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface|null
     * @throws ApiException
     */
    public function createSearchQuery(string $indexId, SearchQueryInterface $searchQuery): ?SearchQueryInterface;

    /**
     * @param string $indexId
     * @param string $searchQueryId
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface|null
     * @throws ApiException
     */
    public function getSearchQuery(string $indexId, string $searchQueryId): ?SearchQueryInterface;

    /**
     * @param string $indexId
     * @param \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface $searchQuery
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface|null
     * @throws ApiException
     */
    public function updateSearchQuery(string $indexId, SearchQueryInterface $searchQuery): ?SearchQueryInterface;

    /**
     * @param string $indexId
     * @param string $searchQueryId
     * @throws ApiException
     */
    public function deleteSearchQuery(string $indexId, string $searchQueryId): void;

    /**
     * @param string $indexId
     * @phpcs:ignore Generic.Files.LineLength.TooLong
     * @param \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface|\LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryInterface $searchQuery
     * @phpcs:ignore Generic.Files.LineLength.TooLong
     * @param \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryInterface|\LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryInterface $publicQuery
     * @return \LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryResponseInterface|\LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SuggestionQueryResponseInterface
     * @throws ApiException
     */
    public function testSearchQuery(string $indexId, $searchQuery, $publicQuery);

    /**
     * @param string $indexId
     * @param array{
     *     queryKey: string,
     *     name: string,
     *     searchQuery: string,
     *     itemId: string,
     *     sessionId: string,
     *     userId: string,
     *     queryOverride?: mixed,
     * } $httpBody
     * @return array{succees: bool}
     * @throws ApiException
     */
    public function testEventStorage(string $indexId, array $httpBody): array;
}
