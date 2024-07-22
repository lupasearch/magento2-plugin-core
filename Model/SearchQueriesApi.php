<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Model;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\DocumentQueryInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;
use LupaSearch\LupaSearchPluginCore\Api\SearchQueriesApiInterface;
use LupaSearch\LupaSearchPluginCore\Factories\DocumentQueryResponseFactoryInterface;
use LupaSearch\LupaSearchPluginCore\Factories\QueriesFactoryInterface;
use LupaSearch\LupaSearchPluginCore\Factories\SearchQueryFactoryInterface;
use LupaSearch\LupaSearchPluginCore\Factories\SuggestionQueryResponseFactoryInterface;
use LupaSearch\Exceptions\ApiException;
use LupaSearch\Exceptions\NotFoundException;
use LupaSearch\LupaClientInterface;
use LupaSearch\Utils\JsonUtils;
use Throwable;

class SearchQueriesApi implements SearchQueriesApiInterface
{
    private LupaClientInterface $client;

    private SearchQueryFactoryInterface $searchQueryFactory;

    private QueriesFactoryInterface $queriesFactory;

    private DocumentQueryResponseFactoryInterface $documentQueryResponseFactory;

    private SuggestionQueryResponseFactoryInterface $suggestionQueryResponseFactory;

    public function __construct(
        LupaClientInterface $client,
        SearchQueryFactoryInterface $searchQueryFactory,
        QueriesFactoryInterface $queriesFactory,
        DocumentQueryResponseFactoryInterface $documentQueryResponseFactory,
        SuggestionQueryResponseFactoryInterface $suggestionQueryResponseFactory
    ) {
        $this->client = $client;
        $this->searchQueryFactory = $searchQueryFactory;
        $this->queriesFactory = $queriesFactory;
        $this->documentQueryResponseFactory = $documentQueryResponseFactory;
        $this->suggestionQueryResponseFactory = $suggestionQueryResponseFactory;
    }

    public function getSearchQueries(string $indexId): ?QueriesInterface
    {
        try {
            $response = $this->client->send(LupaClientInterface::METHOD_GET, "/indices/$indexId/queries", true);
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return null;
        }

        return $this->queriesFactory->create($response);
    }

    public function createSearchQuery(string $indexId, SearchQueryInterface $searchQuery): ?SearchQueryInterface
    {
        try {
            $response = $this->client->send(
                LupaClientInterface::METHOD_POST,
                "/indices/$indexId/queries",
                true,
                JsonUtils::jsonEncode($searchQuery)
            );
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return null;
        }

        return $this->searchQueryFactory->create($response);
    }

    public function getSearchQuery(string $indexId, string $searchQueryId): ?SearchQueryInterface
    {
        try {
            $response = $this->client->send(
                LupaClientInterface::METHOD_GET,
                "/indices/$indexId/queries/$searchQueryId",
                true
            );
        } catch (NotFoundException $exception) {
            return null;
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return null;
        }

        return $this->searchQueryFactory->create($response);
    }

    /**
     * @throws ApiException
     */
    public function updateSearchQuery(string $indexId, SearchQueryInterface $searchQuery): ?SearchQueryInterface
    {
        try {
            $response = $this->client->send(
                LupaClientInterface::METHOD_PUT,
                "/indices/$indexId/queries/" . $searchQuery->getId(),
                true,
                JsonUtils::jsonEncode($searchQuery)
            );
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return null;
        }

        return $this->searchQueryFactory->create($response);
    }

    public function deleteSearchQuery(string $indexId, string $searchQueryId): void
    {
        try {
            $this->client->send(LupaClientInterface::METHOD_DELETE, "/indices/$indexId/queries/$searchQueryId", true);
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return;
        }
    }

    /**
     * @inheritDoc
     */
    public function testSearchQuery(string $indexId, $searchQuery, $publicQuery)
    {
        $data = $this->client->send(
            LupaClientInterface::METHOD_POST,
            "/indices/$indexId/queries/test",
            true,
            JsonUtils::jsonEncode(['searchQuery' => $searchQuery, 'publicQuery' => $publicQuery])
        );

        if ($publicQuery instanceof DocumentQueryInterface) {
            return $this->documentQueryResponseFactory->create($data);
        }

        return $this->suggestionQueryResponseFactory->create($data);
    }

    /**
     * @inheritDoc
     */
    public function testEventStorage(string $indexId, array $httpBody): array
    {
        try {
            return $this->client->send(
                LupaClientInterface::METHOD_POST,
                "/indices/$indexId/events/test",
                true,
                JsonUtils::jsonEncode($httpBody)
            );
        } catch (ApiException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return [];
        }
    }
}
