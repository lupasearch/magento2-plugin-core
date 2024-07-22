<?php

declare(strict_types=1);

namespace LupaSearch\LupaSearchPluginCore\Factories;

use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterface;
use LupaSearch\LupaSearchPluginCore\Api\Data\SearchQueries\QueriesInterfaceFactory;

class QueriesFactory implements QueriesFactoryInterface
{
    /**
     * @var SearchQueryFactory|SearchQueryFactoryInterface
     */
    private $searchQueryFactory;

    private QueriesInterfaceFactory $queriesFactory;

    public function __construct(
        SearchQueryFactoryInterface $searchQueryFactory,
        QueriesInterfaceFactory $queriesFactory
    ) {
        $this->searchQueryFactory = $searchQueryFactory;
        $this->queriesFactory = $queriesFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): QueriesInterface
    {
        $queries = $this->queriesFactory->create();
        $queries->setCurrentPage((int)($data['currentPage'] ?? 0));
        $queries->setLastPage((int)($data['lastPage'] ?? 0));
        $queries->setTotal((int)($data['total'] ?? 0));
        $queries->setPerPage((int)($data['perPage'] ?? 0));

        $searchQueries = [];

        foreach ($data['data'] ?? [] as $searchQueryConfigurationData) {
            $searchQueries[] = $this->searchQueryFactory->create($searchQueryConfigurationData);
        }

        $queries->setData($searchQueries);

        return $queries;
    }
}
