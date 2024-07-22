<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\SearchQueryInterface;
use LupaSearch\LupaSearchPluginCore\Model\Data\SearchQueries\SearchQuery;

class SearchQueryFactory implements SearchQueryFactoryInterface
{
    /**
     * @var QueryConfigurationFactoryInterface
     */
    private $queryConfigurationFactory;

    public function __construct(QueryConfigurationFactoryInterface $queryConfigurationFactory)
    {
        $this->queryConfigurationFactory = $queryConfigurationFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): SearchQueryInterface
    {
        $searchQuery = new SearchQuery();
        $searchQuery->setId($data['id'] ?? '0');
        $searchQuery->setDescription($data['description'] ?? '');
        $searchQuery->setConfiguration($this->queryConfigurationFactory->create($data['configuration'] ?? []));
        $searchQuery->setDebugMode((bool)($data['debugMode'] ?? false));
        $searchQuery->setQueryKey($data['queryKey'] ?? '');
        $searchQuery->setCreatedByUser($data['createdBy'] ?? '');
        $searchQuery->setCreatedAt($data['createdAt'] ?? '');
        $searchQuery->setUpdatedAt($data['updatedAt'] ?? '');

        return $searchQuery;
    }
}
